<?php
// 1) Defina (ou recupere) a data/hora inicial no PHP.
// Pode ser "agora" ou uma data vinda do banco de dados.
$inicioPhp = time(); // exemplo: agora (em segundos)

// (Opcional) Se você tiver uma data específica:
// $inicioPhp = strtotime('2026-02-10 12:00:00'); // converte string para timestamp (segundos)

?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Cronômetro (PHP + JS)</title>
  <style>
    body { font-family: system-ui, sans-serif; padding: 24px; }
    .painel { display: flex; gap: 12px; align-items: center; }
    .valor { font-size: 2rem; font-weight: 700; }
    .label { color: #555; }
    .mono  { font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, "Liberation Mono", monospace; }
    button { padding: 8px 14px; }
  </style>
</head>
<body>
  <h1>Cronômetro contando a partir do horário do servidor (PHP)</h1>

  <div class="painel">
    <div>
      <div class="label">Início (servidor, timestamp)</div>
      <div class="mono"><?= htmlspecialchars($inicioPhp) ?></div>
    </div>
    <div>
      <div class="label">Segundos decorridos</div>
      <div id="segundos" class="valor">0</div>
    </div>
  </div>

  <p class="label">
    O contador usa o horário de início gerado pelo PHP, e o JavaScript atualiza em tempo real sem recarregar.
  </p>

  <script>
    // 2) Recebemos do PHP o timestamp de início (em SEGUNDOS)
    const inicioServidorSeg = <?= json_encode($inicioPhp, JSON_UNESCAPED_UNICODE) ?>;

    // 3) Convertemos para milissegundos para comparar com Date.now()
    const inicioServidorMs = inicioServidorSeg * 1000;

    // 4) Atualização com correção de drift: não somamos "1" cego,
    //    calculamos sempre a diferença real entre agora e o início.
    function atualizarCronometro() {
      const agoraMs = Date.now();
      const diffSeg = Math.floor((agoraMs - inicioServidorMs) / 1000); // segundos inteiros
      document.getElementById('segundos').textContent = diffSeg >= 0 ? diffSeg : 0;
    }

    // 5) Atualiza já na carga e depois a cada 250ms (mais suave e preciso)
    atualizarCronometro();
    const timer = setInterval(atualizarCronometro, 250);
  </script>
</body>
</html>