<?php include '../layouts/default/head.php'; ?>
<link rel="stylesheet" href="/assets/css/extra/bitacora.css">
<title>VerdeFast - Bitácoras</title>
</head>

<body>
    <?php include '../layouts/modules/header.php'; ?>
    <main class="main-content">
        <div class="filters-container">
            <div class="filter-dropdown">
                <span>Planta</span>
                <span class="dropdown-icon">▼</span>
            </div>
            
            <div class="filter-dropdown">
                <span>Mes</span>
                <span class="dropdown-icon">▼</span>
            </div>
            
            <div class="search-bar">
                <span class="search-icon">🔍</span>
                <input type="text" class="search-input" placeholder="Buscar...">
            </div>
        </div>
        
        <div class="filter-info">
            <div class="info-item"><strong>Sembradio: Papa</strong></div>
            <div class="info-item"><strong>Densidad: 100m*20m</strong></div>
            <div class="info-item"><strong>Mes: Enero</strong></div>
        </div>
        
        <div class="bitacora-list">
            <div class="bitacora-item">
                <div class="plant-image">
                    <img src="/assets/img/planta.jpg" alt="Plántula">
                </div>
                
                <div class="data-container">
                    <div class="data-left">
                        <div class="data-date">01/01/2025</div>
                        <div class="data-item">Ph: 7</div>
                        <div class="data-item">Humedad: 10%</div>
                    </div>
                    
                    <div class="data-right">
                        <div class="data-item">Temperatura: 30 °C</div>
                        <div class="data-item">Tamaño: 100 mm</div>
                        <div class="data-item">Producción: 5%</div>
                    </div>
                </div>
            </div>
            
            <div class="bitacora-item">
                <div class="plant-image">
                    <img src="/assets/img/planta.jpg" alt="Plántula">
                </div>
                
                <div class="data-container">
                    <div class="data-left">
                        <div class="data-date">02/01/2025</div>
                        <div class="data-item">Ph: 5</div>
                        <div class="data-item">Humedad: 5%</div>
                    </div>
                    
                    <div class="data-right">
                        <div class="data-item">Temperatura: 20 °C</div>
                        <div class="data-item">Tamaño: 100 mm</div>
                        <div class="data-item">Producción: 5%</div>
                    </div>
                </div>
            </div>
            
            <div class="bitacora-item">
                <div class="plant-image">
                    <img src="/assets/img/planta.jpg" alt="Plántula">
                </div>
                
                <div class="data-container">
                    <div class="data-left">
                        <div class="data-date">03/01/2025</div>
                        <div class="data-item">Ph: 6.5</div>
                        <div class="data-item">Humedad: 8%</div>
                    </div>
                    
                    <div class="data-right">
                        <div class="data-item">Temperatura: 28 °C</div>
                        <div class="data-item">Tamaño: 100 mm</div>
                        <div class="data-item">Producción: 6%</div>
                    </div>
                </div>
            </div>

            <div class="bitacora-item">
                <div class="plant-image">
                    <img src="/assets/img/planta.jpg" alt="Plántula">
                </div>
                
                <div class="data-container">
                    <div class="data-left">
                        <div class="data-date">04/01/2025</div>
                        <div class="data-item">Ph: 4.5</div>
                        <div class="data-item">Humedad: 5%</div>
                    </div>
                    
                    <div class="data-right">
                        <div class="data-item">Temperatura: 35 °C</div>
                        <div class="data-item">Tamaño: 100 mm</div>
                        <div class="data-item">Producción: 6%</div>
                    </div>
                </div>
            </div>
            
            
            <div class="bitacora-item">
                <div class="plant-image">
                    <img src="/assets/img/planta.jpg" alt="Plántula">
                </div>
                
                <div class="data-container">
                    <div class="data-left">
                        <div class="data-date">05/01/2025</div>
                        <div class="data-item">Ph: 5.5</div>
                        <div class="data-item">Humedad: 4%</div>
                    </div>
                    
                    <div class="data-right">
                        <div class="data-item">Temperatura: 38 °C</div>
                        <div class="data-item">Tamaño: 100 mm</div>
                        <div class="data-item">Producción: 7%</div>
                    </div>
                </div>
            </div>            
        </div>
    </main>
    <?php include '../layouts/default/footer.php'; ?>
    <script src="/assets/js/bitacora.js"></script>
</body>
</html>