<?php include '../layouts/default/head.php'; ?>
<link rel="stylesheet" href="/assets/css/admin/alertas.css">
<title>VerdeFast - Administrador</title>
</head>

<body>
    <?php include '../layouts/modules/header.php'; ?>
    <main class="main-content">
        <div class="alertas-header">
            <h1>Alertas</h1>
            <div class="search-bar">
                <span class="search-icon">🔍</span>
                <input type="text" class="search-input" placeholder="Buscar...">
            </div>
        </div>
        
        <div class="alertas-table-container">
            <table class="alertas-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Sembradio</th>
                        <th>Direccion</th>
                        <th>Tipo de alerta</th>
                        <th>Alerta</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td>Jose Perez</td>
                        <td>Papas</td>
                        <td>Ciudad Valles</td>
                        <td>Alerta de fuga</td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <button class="action-button">
                                <span class="edit-icon">✏️</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>Jose Hernandez</td>
                        <td>Rabanos</td>
                        <td>Ciudad Valles</td>
                        <td>Sistema apagado</td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <button class="action-button">
                                <span class="edit-icon">✏️</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>Jose Jose</td>
                        <td>Papas</td>
                        <td>Ciudad Valles</td>
                        <td>Sistema ensendido</td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <button class="action-button">
                                <span class="edit-icon">✏️</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>04</td>
                        <td>Pablo Paz</td>
                        <td>Papas</td>
                        <td>Ciudad Valles</td>
                        <td>Alerta de fuga</td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <button class="action-button">
                                <span class="edit-icon">✏️</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>05</td>
                        <td>Pedro Cruz</td>
                        <td>Papas</td>
                        <td>Ciudad Valles</td>
                        <td>Alerta de fuga</td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <button class="action-button">
                                <span class="edit-icon">✏️</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>06</td>
                        <td>Jose Cruz</td>
                        <td>Papas</td>
                        <td>Ciudad Valles</td>
                        <td>Alerta de fuga</td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <button class="action-button">
                                <span class="edit-icon">✏️</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>07</td>
                        <td>Miguel Diaz</td>
                        <td>Papas</td>
                        <td>Ciudad Valles</td>
                        <td>Alerta de fuga</td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <button class="action-button">
                                <span class="edit-icon">✏️</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>08</td>
                        <td>Jose Perez</td>
                        <td>Papas</td>
                        <td>Ciudad Valles</td>
                        <td>Alerta de fuga</td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <button class="action-button">
                                <span class="edit-icon">✏️</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <?php include '../layouts/default/footer.php'; ?>
    <script src="/assets/js/admin_alertas.js"></script>
</body>
</html>