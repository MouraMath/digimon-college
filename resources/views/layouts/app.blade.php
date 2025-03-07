<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigimonMM - @yield('title', 'CRUD de Digimons')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #3f51b5;
            --secondary-color: #ff9800;
            --dark-color: #1a237e;
            --light-color: #e8eaf6;
            --danger-color: #f44336;
            --success-color: #4caf50;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        main {
            flex: 1;
        }
        
        .navbar {
            background-color: var(--primary-color);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            color: white !important;
        }
        
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            border: none;
            transition: transform 0.3s ease;
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--dark-color);
            border-color: var(--dark-color);
        }
        
        .btn-secondary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .table {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        
        .table th {
            background-color: var(--light-color);
            color: var(--dark-color);
            font-weight: 600;
        }
        
        .page-header {
            margin-bottom: 30px;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
        }
        
        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .pagination .page-link {
            color: var(--primary-color);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(63, 81, 181, 0.25);
        }
        
        .badge-level {
            font-size: 0.8rem;
            padding: 5px 10px;
            border-radius: 20px;
        }
        
        .badge-rookie { background-color: #8bc34a; }
        .badge-champion { background-color: #03a9f4; }
        .badge-ultimate { background-color: #9c27b0; }
        .badge-mega { background-color: #f44336; }
        
        .badge-attribute {
            font-size: 0.8rem;
            padding: 5px 10px;
            border-radius: 20px;
        }
        
        .badge-vaccine { background-color: #4caf50; }
        .badge-virus { background-color: #f44336; }
        .badge-data { background-color: #2196f3; }
        .badge-free { background-color: #9e9e9e; }
        
        .digimon-detail-card {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .digimon-header {
            background-color: var(--primary-color);
            color: white;
            padding: 20px;
            position: relative;
        }
        
        .digimon-avatar {
            width: 80px;
            height: 80px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: var(--primary-color);
            margin: 0 auto 15px;
        }
        
        .digimon-body {
            padding: 20px;
        }
        
        .digimon-attribute {
            margin-bottom: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        
        .digimon-attribute:last-child {
            border-bottom: none;
        }
        
        .attribute-label {
            font-weight: 600;
            color: var(--dark-color);
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
                margin-bottom: 15px;
                border: 1px solid #dee2e6;
                border-radius: 10px;
                padding: 10px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.05);
                background-color: white;
            }
            
            .table-responsive-card tbody td {
                display: flex;
                justify-content: space-between;
                padding: 8px 0;
                border: none;
                border-bottom: 1px solid #eee;
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
                gap: 10px;
                padding-top: 15px;
            }
            
            .page-header {
                flex-direction: column;
                align-items: flex-start !important;
            }
            
            .page-header a {
                margin-top: 10px;
            }
        }
    </style>
    
    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('digimons.index') }}">
                <i class="fas fa-dragon me-2"></i> DigimonMM
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('digimons.index') ? 'active' : '' }}" href="{{ route('digimons.index') }}">
                            <i class="fas fa-list me-1"></i> Listar Digimons
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('digimons.create') ? 'active' : '' }}" href="{{ route('digimons.create') }}">
                            <i class="fas fa-plus me-1"></i> Adicionar Digimon
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-4">
        @yield('content')
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">DigimonMM &copy; {{ date('Y') }} - Desenvolvido para trabalho acadêmico</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- SweetAlert2 para confirmações e alertas mais bonitos -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        // Confirmação de exclusão com SweetAlert2
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-delete');
            
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const form = this.closest('form');
                    
                    Swal.fire({
                        title: 'Tem certeza?',
                        text: "Esta ação não pode ser revertida!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#f44336',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Sim, excluir!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
            
            // Esconder mensagens de alerta após 5 segundos
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.classList.add('fade');
                    setTimeout(() => {
                        alert.remove();
                    }, 500);
                }, 5000);
            });
        });
    </script>
    
    @yield('scripts')
</body>
</html>
