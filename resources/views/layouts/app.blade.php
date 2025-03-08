<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de gerenciamento de Digimons - CRUD completo">
    <title>DigimonMM - @yield('title', 'CRUD de Digimons')</title>
    
    <!-- Preload de fontes e recursos críticos -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" as="style">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" as="style">
    
    <!-- Bootstrap 5 CSS (versão minificada) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome para ícones (apenas os ícones necessários) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" media="print" onload="this.media='all'">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    
    <style>
        /* Variáveis CSS para consistência de cores e facilidade de manutenção */
        :root {
            --primary-color: #3f51b5;
            --primary-light: #757de8;
            --primary-dark: #002984;
            --secondary-color: #ff9800;
            --secondary-light: #ffc947;
            --secondary-dark: #c66900;
            --dark-color: #1a237e;
            --light-color: #e8eaf6;
            --danger-color: #f44336;
            --success-color: #4caf50;
            --text-color: #333;
            --text-light: #757575;
            --background-color: #f5f5f5;
            --card-background: #ffffff;
            --transition-speed: 0.3s;
            --border-radius: 10px;
            --box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        /* Estilos base */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            line-height: 1.6;
            transition: background-color var(--transition-speed) ease;
        }
        
        main {
            flex: 1;
            padding: 1.5rem 0;
        }
        
        /* Melhorias de acessibilidade */
        :focus {
            outline: 3px solid var(--primary-light);
            outline-offset: 2px;
        }
        
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border-width: 0;
        }
        
        /* Navegação */
        .navbar {
            background-color: var(--primary-color);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: all var(--transition-speed) ease;
        }
        
        .navbar-brand {
            font-weight: 700;
            color: white !important;
            letter-spacing: 0.5px;
        }
        
        .navbar-brand:hover {
            transform: translateY(-2px);
        }
        
            .nav-link {
        position: relative;
        transition: all var(--transition-speed) ease;
        padding: 0.5rem 1rem;
        margin: 0 0.25rem;
        border-radius: var(--border-radius);
        color: rgba(255, 255, 255, 0.9) !important;
    }

    .nav-link:hover, .nav-link.active {
        background-color: rgba(255, 255, 255, 0.1);
        color: white !important;
    }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background-color: white;
            transition: all var(--transition-speed) ease;
            transform: translateX(-50%);
        }
        
        .nav-link:hover::after, .nav-link.active::after {
            width: 80%;
        }
        
        /* Cards e containers */
        .card {
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            border: none;
            transition: transform var(--transition-speed) ease, box-shadow var(--transition-speed) ease;
            overflow: hidden;
            background-color: var(--card-background);
            margin-bottom: 1.5rem;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }
        
        .card-header {
            background-color: var(--card-background);
            border-bottom: 1px solid rgba(0,0,0,0.05);
            padding: 1.25rem 1.5rem;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        .card-footer {
            background-color: var(--card-background);
            border-top: 1px solid rgba(0,0,0,0.05);
            padding: 1.25rem 1.5rem;
        }
        
        /* Botões com feedback visual */
        .btn {
            border-radius: 50px;
            padding: 0.5rem 1.25rem;
            font-weight: 500;
            transition: all var(--transition-speed) ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%, -50%);
            transform-origin: 50% 50%;
        }
        
        .btn:active::after {
            animation: ripple 0.6s ease-out;
        }
        
        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }
            100% {
                transform: scale(20, 20);
                opacity: 0;
            }
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover, .btn-primary:focus {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        
        .btn-secondary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .btn-secondary:hover, .btn-secondary:focus {
            background-color: var(--secondary-dark);
            border-color: var(--secondary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        
        .btn-danger {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }
        
        .btn-danger:hover, .btn-danger:focus {
            background-color: #d32f2f;
            border-color: #d32f2f;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        
        .btn-sm {
            padding: 0.25rem 0.75rem;
            font-size: 0.875rem;
        }
        
        /* Tabelas */
        .table {
            background-color: var(--card-background);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            margin-bottom: 0;
        }
        
        .table th {
            background-color: var(--light-color);
            color: var(--dark-color);
            font-weight: 600;
            border-top: none;
            padding: 1rem;
        }
        
        .table td {
            padding: 1rem;
            vertical-align: middle;
        }
        
        .table tr {
            transition: background-color var(--transition-speed) ease;
        }
        
        .table tbody tr:hover {
            background-color: rgba(0,0,0,0.02);
        }
        
        /* Cabeçalhos de página */
        .page-header {
            margin-bottom: 2rem;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .page-header h1 {
            font-size: 1.75rem;
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 0;
        }
        
        /* Paginação */
        .pagination {
            margin-bottom: 0;
        }
        
        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .pagination .page-link {
            color: var(--primary-color);
            padding: 0.5rem 0.75rem;
            transition: all var(--transition-speed) ease;
        }
        
        .pagination .page-link:hover {
            background-color: var(--light-color);
            transform: translateY(-2px);
        }
        
        /* Formulários */
        .form-control, .form-select {
            border-radius: var(--border-radius);
            padding: 0.75rem 1rem;
            border: 1px solid rgba(0,0,0,0.1);
            transition: all var(--transition-speed) ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(63, 81, 181, 0.25);
        }
        
        .form-label {
            font-weight: 500;
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }
        
        /* Badges */
        .badge {
            font-weight: 500;
            letter-spacing: 0.5px;
            padding: 0.5rem 0.75rem;
            border-radius: 50px;
            transition: all var(--transition-speed) ease;
        }
        
        .badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .badge-level {
            font-size: 0.8rem;
        }
        
        .badge-rookie { background-color: #8bc34a; }
        .badge-champion { background-color: #03a9f4; }
        .badge-ultimate { background-color: #9c27b0; }
        .badge-mega { background-color: #f44336; }
        
        .badge-attribute {
            font-size: 0.8rem;
        }
        
        .badge-vaccine { background-color: #4caf50; }
        .badge-virus { background-color: #f44336; }
        .badge-data { background-color: #2196f3; }
        .badge-free { background-color: #9e9e9e; }
        
        /* Alertas */
        .alert {
            border-radius: var(--border-radius);
            border: none;
            box-shadow: var(--box-shadow);
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
            animation: slideDown var(--transition-speed) ease;
        }
        
        @keyframes slideDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        /* Detalhes do Digimon */
        .digimon-detail-card {
            background-color: var(--card-background);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            transition: transform var(--transition-speed) ease, box-shadow var(--transition-speed) ease;
        }
        
        .digimon-detail-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        
        .digimon-header {
            background-color: var(--primary-color);
            color: white;
            padding: 2rem 1.5rem;
            position: relative;
            text-align: center;
        }
        
        .digimon-avatar {
            width: 100px;
            height: 100px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: var(--primary-color);
            margin: 0 auto 1.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transition: transform var(--transition-speed) ease;
        }
        
        .digimon-detail-card:hover .digimon-avatar {
            transform: scale(1.05) rotate(5deg);
        }
        
        .digimon-body {
            padding: 2rem 1.5rem;
        }
        
        .digimon-attribute {
            margin-bottom: 1.25rem;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            padding-bottom: 1rem;
            display: flex;
            flex-wrap: wrap;
        }
        
        .digimon-attribute:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }
        
        .attribute-label {
            font-weight: 600;
            color: var(--dark-color);
            width: 40%;
            padding-right: 1rem;
        }
        
        .attribute-value {
            width: 60%;
        }
        
       /* Tema escuro (melhorado) */
        .dark-mode {
            --background-color: #121212;
            --card-background: #1e1e1e;
            --text-color: #e0e0e0;
            --text-light: #b0b0b0;
            --light-color: #2d2d2d;
        }

        .dark-mode .navbar {
            background-color: #1a1a2e;
        }

        .dark-mode .table th,
        .dark-mode .table th a {
            background-color: #1a1a2e !important;
            color: #ffd700 !important;
            font-weight: 600;
            border-bottom: 1px solid #333;
            text-shadow: 0 0 2px rgba(255, 215, 0, 0.3);
        }

        .dark-mode .table th a:hover {
            color: #fff !important;
            text-decoration: none;
        }

        .dark-mode .table th a i {
            color: #ffd700 !important;
        }

        .dark-mode .table {
            color: #e0e0e0;
        }

        .dark-mode .page-header h1 {
            color: #e0e0e0;
        }

        /* Melhorar a barra de pesquisa no modo escuro */
        .dark-mode .form-control {
            background-color: #2d2d3d;
            border: 1px solid #444;
            color: white;
        }

        .dark-mode .form-control:focus {
            background-color: #3d3d4d;
            border-color: #ffd700;
            box-shadow: 0 0 0 0.25rem rgba(255, 215, 0, 0.25);
        }
        
        .dark-mode .form-select {
            background-color: #2d2d2d;
            border-color: #3d3d3d;
            color: #e0e0e0;
        }

        .dark-mode .form-control::placeholder {
            color: #888;
        }

        /* Melhorar o botão de busca no modo escuro */
        .dark-mode .btn-primary {
            background-color: #1a1a2e;
            border-color: #ffd700;
        }

        .dark-mode .btn-primary:hover {
            background-color: #ffd700;
            color: #1a1a2e;
        }



        /* Melhorar o título "Digimons Cadastrados" no modo escuro */

        .dark-mode .card-header {
        background-color: #822659 !important;
        border-color: #5e1c40;
    }

        .dark-mode .card-header h5 {
           color: #ffffff !important;
            font-weight: 600;
            text-shadow: 0 0 2px rgba(255, 255, 255, 0.2);
        }         

        /* Para garantir que o texto nos cabeçalhos seja bem visível */
        .dark-mode .card-header .row {
            color: #f0f0f0;
        }

        /* Para melhorar a aparência da barra de pesquisa contra o fundo bordô */
        .dark-mode .card-header .form-control {
            background-color: #3f3f3f;
            border-color: #5e1c40;
            color: white;
        }

        
        /* Corrigir o footer no modo escuro */
        .dark-mode .card-footer {
            background-color: #1e1e1e !important;
            border-color: #333;
            color: #e0e0e0;
        }

        /* Melhorar a paginação no modo escuro */
        .dark-mode .pagination {
            margin-bottom: 0;
        }

        .dark-mode .pagination .page-item .page-link {
            background-color: #2d2d2d;
            border-color: #444;
            color: #e0e0e0;
            font-size: 0.9rem;
            padding: 0.4rem 0.75rem;
        }

        .dark-mode .pagination .page-item.active .page-link {
            background-color: #822659;
            border-color: #5e1c40;
            color: white;
        }

        /* Reduzir o tamanho das setas de navegação */
        .pagination .page-link[aria-label="Next"],
        .pagination .page-link[aria-label="Previous"],
        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            font-size: 0.85rem;
            padding: 0.3rem 0.5rem;
            line-height: 1;
        }

        /* Reduzir especificamente o tamanho do ícone da seta */
        .pagination .page-link svg,
        .pagination .page-link i {
            width: 12px;
            height: 12px;
            font-size: 12px;
        }
        /* Estilizar as setas para combinar com o tema */
        .dark-mode .pagination .page-link[aria-label="Next"],
        .dark-mode .pagination .page-link[aria-label="Previous"] {
            background-color: #2196f3;
            color: white;
            border-color: #1976d2;
        }

        .dark-mode .pagination .page-link:hover {
            background-color: #3d3d3d;
            color: #ffd700;
        }

        /* Melhorar o texto de exibição de registros */
        .dark-mode .text-muted {
            color: #b0b0b0 !important;
        }

        .dark-mode .form-text {
            color: #aaa;
        }

        .dark-mode .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
        }

        .dark-mode .nav-link:hover, .dark-mode .nav-link.active {
            color: white !important;
        }

        /* Ajustes adicionais para o modo escuro */
        .dark-mode .digimon-header {
            background-color: #1a1a2e;
        }

        .dark-mode .table tbody tr:hover {
            background-color: rgba(30, 30, 60, 0.7) !important;
            box-shadow: 0 0 12px rgba(255, 215, 0, 0.2);
            transition: all 0.3s ease;
}

        .dark-mode .table tbody tr:hover td,
        .dark-mode .table tbody tr:hover td:before,
        .dark-mode .table-responsive-card tbody tr:hover td,
        .dark-mode .table-responsive-card tbody tr:hover td:before {
            color: #ffd700 !important; /* Cor dourada */
            text-shadow: 0 0 3px rgba(255, 215, 0, 0.3);
            font-weight: 500;
        }

        .dark-mode .table tbody tr:hover .badge {
            box-shadow: 0 0 8px rgba(255, 215, 0, 0.4);
        }

        .dark-mode .pagination .page-link {
            background-color: #2d2d2d;
            border-color: #444;
            color: #e0e0e0;
        }

        .dark-mode .pagination .page-link:hover {
            background-color: #3d3d3d;
        }

        .dark-mode .form-check-input {
            background-color: #2d2d2d;
            border-color: #444;
        }

        .dark-mode .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }


        /* Substituir setas por texto e ajustar tamanho da paginação */
        .pagination .page-item:first-child .page-link::before {
            content: "Voltar";
            font-size: 0.8rem;
        }

        .pagination .page-item:last-child .page-link::before {
            content: "Próxima";
            font-size: 0.8rem;
        }

        .pagination .page-item:first-child .page-link svg,
        .pagination .page-item:last-child .page-link svg,
        .pagination .page-link[aria-label="Next"] svg,
        .pagination .page-link[aria-label="Previous"] svg {
            display: none;
        }

        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            padding: 0.3rem 0.8rem;
            font-size: 0;
            line-height: 1.5;
        }

        /* Ajustes adicionais para o modo escuro */
        .dark-mode .pagination .page-item:first-child .page-link,
        .dark-mode .pagination .page-item:last-child .page-link {
            background-color: #2d2d2d;
            border-color: #444;
        }

        .dark-mode .pagination .page-item:first-child .page-link:hover,
        .dark-mode .pagination .page-item:last-child .page-link:hover {
            background-color: #3d3d3d;
            color: #ffd700;
        }

        

        
        /* Responsividade para tabelas em dispositivos móveis */
        @media (max-width: 767.98px) {
            .table-responsive-card {
                display: block;
            }
            
            .table-responsive-card thead {
                display: none;
            }
            
            .table-responsive-card tbody tr {
                display: block;
                margin-bottom: 1rem;
                border: 1px solid rgba(0,0,0,0.05);
                border-radius: var(--border-radius);
                padding: 1rem;
                box-shadow: 0 2px 4px rgba(0,0,0,0.05);
                background-color: var(--card-background);
            }
            
            .table-responsive-card tbody td {
                display: flex;
                justify-content: space-between;
                padding: 0.75rem 0;
                border: none;
                border-bottom: 1px solid rgba(0,0,0,0.05);
            }
            
            .table-responsive-card tbody td:last-child {
                border-bottom: none;
            }
            
            .table-responsive-card tbody td:before {
                content: attr(data-label);
                font-weight: 600;
                color: var(--dark-color);
            }
            
            .table-responsive-card tbody td:last-child {
                display: flex;
                justify-content: center;
                gap: 0.75rem;
                padding-top: 1rem;
            }
            
            .page-header {
                flex-direction: column;
                align-items: flex-start !important;
            }
            
            .page-header a {
                margin-top: 1rem;
                align-self: flex-start;
            }
            
            .digimon-attribute {
                flex-direction: column;
            }
            
            .attribute-label, .attribute-value {
                width: 100%;
            }
            
            .attribute-label {
                margin-bottom: 0.5rem;
            }
        }
        
        /* Tablets (retrato) */
        @media (min-width(min-width: 768px) and (max-width: 991.98px) {
            .container {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }    
        
        
        .card {
            margin-bottom: 1.25rem;
        }
        
        .digimon-avatar {
            width: 80px;
            height: 80px;
            font-size: 2rem;
        }
        
        .page-header h1 {
            font-size: 1.5rem;
        }
    }
    
    /* Tablets (paisagem) */
    @media (min-width: 992px) and (max-width: 1199.98px) {
        .container {
            padding-left: 2rem;
            padding-right: 2rem;
        }
    }
    
    /* Animações e transições */
    .fade-in {
        animation: fadeIn 0.5s ease-in;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    .slide-up {
        animation: slideUp 0.5s ease-out;
    }
    
    @keyframes slideUp {
        from { transform: translateY(20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
    
    /* Melhorias de acessibilidade */
    .skip-link {
        position: absolute;
        top: -40px;
        left: 0;
        background: var(--primary-color);
        color: white;
        padding: 8px;
        z-index: 100;
        transition: top 0.3s ease;
    }
    
    .skip-link:focus {
        top: 0;
    }
</style>

@yield('styles')
    </head>
        <body> <!-- Link de acessibilidade para pular para o conteúdo principal --> 
            <a href="#main-content" class="skip-link">Pular para o conteúdo principal</a>
            <nav class="navbar navbar-expand-lg navbar-dark mb-4" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="{{ route('digimons.index') }}">
            <i class="fas fa-dragon me-2" aria-hidden="true"></i> DigimonMM
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('digimons.index') ? 'active' : '' }}" href="{{ route('digimons.index') }}" aria-current="{{ request()->routeIs('digimons.index') ? 'page' : 'false' }}">
                        <i class="fas fa-list me-1" aria-hidden="true"></i> Listar Digimons
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('digimons.create') ? 'active' : '' }}" href="{{ route('digimons.create') }}" aria-current="{{ request()->routeIs('digimons.create') ? 'page' : 'false' }}">
                        <i class="fas fa-plus me-1" aria-hidden="true"></i> Adicionar Digimon
                    </a>
                </li>
                <li class="nav-item">
                    <button id="theme-toggle" class="nav-link btn" aria-label="Alternar tema escuro">
                        <i class="fas fa-moon me-1" aria-hidden="true"></i> Tema
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container py-4" id="main-content">
    @yield('content')
</main>

<footer class="bg-dark text-white py-4 mt-5">
    <div class="container text-center">
        <p class="mb-0">DigimonMM &copy; {{ date('Y') }} - Desenvolvido para trabalho acadêmico</p>
        <div class="mt-2">
            <a href="#" class="text-white me-3" aria-label="Política de Privacidade">Privacidade</a>
            <a href="#" class="text-white me-3" aria-label="Termos de Uso">Termos</a>
            <a href="#" class="text-white" aria-label="Acessibilidade">Acessibilidade</a>
        </div>
    </div>
</footer>

<!-- Bootstrap 5 JS Bundle com Popper (versão minificada) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" defer></script>

<!-- SweetAlert2 para confirmações e alertas mais bonitos (carregado sob demanda) -->
<script>
    // Carregamento sob demanda do SweetAlert2
    function loadSweetAlert(callback) {
        if (window.Swal) {
            callback();
            return;
        }
        
        const script = document.createElement('script');
        script.src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11';
        script.onload = callback;
        document.head.appendChild(script);
    }
    
    // Confirmação de exclusão com SweetAlert2
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-delete');
        
        if (deleteButtons.length > 0) {
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const form = this.closest('form');
                    
                    loadSweetAlert(function() {
                        Swal.fire({
                            title: 'Tem certeza?',
                            text: "Esta ação não pode ser revertida!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#f44336',
                            cancelButtonColor: '#6c757d',
                            confirmButtonText: 'Sim, excluir!',
                            cancelButtonText: 'Cancelar',
                            focusConfirm: false,
                            focusCancel: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });
                });
            });
        }
        
        // Esconder mensagens de alerta após 5 segundos com animação
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.classList.add('fade');
                setTimeout(() => {
                    alert.remove();
                }, 500);
            }, 5000);
        });
        
        // Alternar tema escuro
        const themeToggle = document.getElementById('theme-toggle');
        const body = document.body;
        const icon = themeToggle.querySelector('i');
        
        // Verificar preferência salva
        const darkMode = localStorage.getItem('darkMode') === 'true';
        
        // Aplicar tema inicial
        if (darkMode) {
            body.classList.add('dark-mode');
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
        }
        
        themeToggle.addEventListener('click', function() {
            body.classList.toggle('dark-mode');
            const isDarkMode = body.classList.contains('dark-mode');
            
            // Salvar preferência
            localStorage.setItem('darkMode', isDarkMode);
            
            // Alternar ícone
            if (isDarkMode) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
            }
        });
        
        // Adicionar classes de animação aos elementos
        document.querySelectorAll('.card').forEach((card, index) => {
            setTimeout(() => {
                card.classList.add('fade-in');
            }, index * 100);
        });
        
        // Adicionar feedback visual aos botões
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('mousedown', function() {
                this.style.transform = 'scale(0.95)';
            });
            
            btn.addEventListener('mouseup', function() {
                this.style.transform = '';
            });
            
            btn.addEventListener('mouseleave', function() {
                this.style.transform = '';
            });
        });
    });
</script>

    @yield('scripts')

    </body> 
</html>
