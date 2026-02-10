<?php
// 1) Certifique-se de usar o fuso correto do servidor:
date_default_timezone_set('America/Sao_Paulo');

// 2) "Agora" do servidor em milissegundos para melhor precisão no JS:
$agoraServidorMs = (int) (microtime(true) * 1000);
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Data e Hora (segundos em tempo real) — PHP + JS</title>
  <style>
    :root { color-scheme: light dark; }
    body { font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif; padding: 24px; }
    h1 { margin: 0 0 12px; }
    .linha { display: flex; gap: 16px; align-items: baseline; flex-wrap: wrap; }
    .rotulo { color: #666; font-size: .95rem; }
    .valor { font-size: 2rem; font-weight: 700; }
    .mono  { font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, "Liberation Mono", monospace; }
    .fraco { color: #888; }
  </style>
</head>
<body>
  <h1>Data e Hora (sincronizado com o servidor)</h1>

  <div class="linha">
    <div>
      <div class="rotulo">Timestamp do servidor (ms)</div>
      <div id="tsServidor" class="mono"><?= htmlspecialchars($agoraServidorMs) ?></div>
    </div>
  </div>

  <div style="margin-top:18px">
    <div class="rotulo">Data</div>
    <div id="data" class="valor">--</div>
  </div>

  <div style="margin-top:10px">
    <div class="rotulo">Hora (com segundos em tempo real)</div>
    <div id="hora" class="valor">--:--:--</div>
    <div class="fraco mono" id="sincronizacao"></div>
  </div>

  <script>
    // ====== 1) Sincronização com o servidor ======
    const servidorAgoraMs = <?= json_encode($agoraServidorMs, JSON_UNESCAPED_UNICODE) ?>;
    const offsetMs = servidorAgoraMs - Date.now(); // serverNow ≈ clientNow + offset

    function agoraSincronizadoMs() {
      return Date.now() + offsetMs;
    }

    // ====== 2) Formatadores (pt-BR) ======
    const fmtData = new Intl.DateTimeFormat('pt-BR', {
      year: 'numeric',
      month: 'long',
      day: '2-digit'
    });

    function formatarHoraComSegundos(d) {
      const hh = String(d.getHours()).padStart(2, '0');
      const mm = String(d.getMinutes()).padStart(2, '0');
      const ss = String(d.getSeconds()).padStart(2, '0');
      return `${hh}:${mm}:${ss}`;
    }

    // ====== 3) Renderização ======
    function renderizar() {
      const ms = agoraSincronizadoMs();
      const d  = new Date(ms);

      // Data: "10 de fevereiro de 2026"
      document.getElementById('data').textContent = fmtData.format(d);

      // Hora: "14:58:07" — atualiza a cada segundo, automaticamente vira o minuto/hora/dia
      document.getElementById('hora').textContent = formatarHoraComSegundos(d);
    }

    // ====== 4) Alinhar à virada do segundo para evitar drift ======
    function iniciarAtualizacaoPorSegundo() {
      // Renderiza já
      renderizar();

      // Calcula quanto falta para a PRÓXIMA virada de segundo sincronizada
      const ms = agoraSincronizadoMs();
      const restanteAteProxSegundo = 1000 - (ms % 1000);

      // Agenda a primeira atualização exatamente na virada do segundo…
      setTimeout(() => {
        renderizar();
        // …e depois atualiza de 1000 em 1000 ms (alinhado)
        setInterval(renderizar, 1000);
      }, restanteAteProxSegundo);
    }

    // (Opcional) Mostrar info de sincronização
    document.getElementById('sincronizacao').textContent =
      `offset (cliente→servidor): ${offsetMs} ms`;

    // Start!
    iniciarAtualizacaoPorSegundo();
  </script>
</body>
</html>