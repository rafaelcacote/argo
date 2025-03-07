@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                    <p class="mb-0">Ordem de Serviços</p>
                    <a href="{{ route('ordem_de_servicos.create') }}" class="btn btn-primary btn-sm ms-auto">
                        <i class="fas fa-plus"></i> Nova Ordem de Serviço
                    </a>
                </div>
            </div>
            <div class="card-body">
                <!-- Botão para abrir o drawer -->
                <div class="mb-3">
                    <button id="openDrawerBtn" class="btn btn-info">
                        <i class="fas fa-bars me-1"></i> Abrir Drawer
                    </button>
                </div>

                <!-- Tabela para desktop -->
                <div class="table-responsive d-none d-md-block">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome do Cliente</th>
                                <th scope="col">Serviço</th>
                                <th scope="col">Data</th>
                                <th scope="col">Status</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aqui você pode adicionar um loop para listar as ordens de serviço -->
                            <tr>
                                <th scope="row">1</th>
                                <td>Cliente Exemplo</td>
                                <td>Serviço Exemplo</td>
                                <td>01/01/2023</td>
                                <td>Em andamento</td>
                                <td>
                                    <button class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Fim do loop -->
                        </tbody>
                    </table>
                </div>

                <!-- Cards para mobile -->
                <div class="d-md-none">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Cliente Exemplo</h5>
                            <div class="card-text mb-2"><strong>Serviço:</strong> Serviço Exemplo</div>
                            <div class="card-text mb-2"><strong>Data:</strong> 01/01/2023</div>
                            <div class="card-text mb-3"><strong>Status:</strong> <span class="badge bg-info">Em
                                    andamento</span></div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-sm btn-info me-1">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-warning me-1">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Aqui você pode continuar o loop para cards adicionais -->
                </div>
            </div>
        </div>
    </div>

    <!-- Drawer component -->
    <div id="bottom-drawer" class="bottom-drawer">
        <div class="drawer-header">
            <div class="drawer-title">Detalhes da Ordem de Serviço</div>
            <button id="closeDrawer" class="btn-close" aria-label="Fechar"></button>
        </div>
        <div class="drawer-content">
            <h4>Informações adicionais</h4>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Cliente:</strong> Cliente Exemplo</p>
                    <p><strong>Telefone:</strong> (11) 98765-4321</p>
                    <p><strong>Email:</strong> cliente@exemplo.com</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Serviço:</strong> Instalação de Software</p>
                    <p><strong>Data Início:</strong> 01/01/2023</p>
                    <p><strong>Previsão Término:</strong> 15/01/2023</p>
                </div>
            </div>
            <div class="mt-4">
                <h5>Histórico</h5>
                <ul class="list-group">
                    <li class="list-group-item">03/01/2023 - Diagnóstico inicial realizado</li>
                    <li class="list-group-item">05/01/2023 - Compra de peças necessárias</li>
                    <li class="list-group-item">08/01/2023 - Início da instalação</li>
                </ul>
            </div>
        </div>
        <!-- Adicionado botão no footer do drawer -->
        <div class="drawer-footer">
            <button id="closeDrawerFooter" class="btn btn-secondary btn-block w-100">
                <i class="fas fa-times me-2"></i>Fechar
            </button>
        </div>
    </div>
    <div id="drawer-backdrop" class="drawer-backdrop"></div>

    <!-- Scripts inline para garantir que funcionem -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const drawer = document.getElementById('bottom-drawer');
            const backdrop = document.getElementById('drawer-backdrop');
            const openBtn = document.getElementById('openDrawerBtn');
            const closeBtn = document.getElementById('closeDrawer');
            const closeFooterBtn = document.getElementById('closeDrawerFooter');

            if (!drawer || !backdrop || !openBtn || !closeBtn) {
                console.error('Elementos do drawer não encontrados');
                return;
            }

            function openDrawer() {
                drawer.classList.add('open');
                backdrop.classList.add('show');
                document.body.style.overflow = 'hidden';
            }

            function closeDrawer() {
                drawer.classList.remove('open');
                backdrop.classList.remove('show');
                document.body.style.overflow = '';
            }

            openBtn.addEventListener('click', openDrawer);
            closeBtn.addEventListener('click', closeDrawer);
            closeFooterBtn.addEventListener('click', closeDrawer);
            backdrop.addEventListener('click', closeDrawer);

            // Código alternativo caso o evento de click não funcione
            document.getElementById('openDrawerBtn').onclick = function() {
                document.getElementById('bottom-drawer').style.bottom = '0';
                document.getElementById('drawer-backdrop').style.display = 'block';
                document.body.style.overflow = 'hidden';
            };

            document.getElementById('closeDrawer').onclick = function() {
                document.getElementById('bottom-drawer').style.bottom = '-100%';
                document.getElementById('drawer-backdrop').style.display = 'none';
                document.body.style.overflow = '';
            };

            document.getElementById('closeDrawerFooter').onclick = function() {
                document.getElementById('bottom-drawer').style.bottom = '-100%';
                document.getElementById('drawer-backdrop').style.display = 'none';
                document.body.style.overflow = '';
            };
        });
    </script>

    <style>
        .bottom-drawer {
            position: fixed;
            bottom: -100%;
            left: 0;
            width: 100%;
            background-color: white;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
            box-shadow: 0px -2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1050;
            max-height: 80vh;
            transition: bottom 0.3s ease-in-out;
            overflow-y: auto;
        }

        .bottom-drawer.open {
            bottom: 0 !important;
        }

        .drawer-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 20px;
            border-bottom: 1px solid #e9ecef;
        }

        .drawer-title {
            font-size: 18px;
            font-weight: 600;
        }

        .drawer-content {
            padding: 20px;
        }

        .drawer-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1040;
            display: none;
        }

        .drawer-backdrop.show {
            display: block !important;
        }

        .btn-close {
            font-size: 1.5rem;
            padding: 0.5rem;
            cursor: pointer;
            background-color: transparent;
            border: 0;
            appearance: none;
        }

        .drawer-footer {
            padding: 16px 20px;
            border-top: 1px solid #e9ecef;
            position: sticky;
            bottom: 0;
            background-color: white;
        }
    </style>
@endsection

@push('scripts')
    <script>
        // Código adicional de segurança caso o evento DOMContentLoaded não seja suficiente
        window.onload = function() {
            const openBtn = document.getElementById('openDrawerBtn');
            if (openBtn) {
                openBtn.addEventListener('click', function() {
                    const drawer = document.getElementById('bottom-drawer');
                    const backdrop = document.getElementById('drawer-backdrop');
                    if (drawer && backdrop) {
                        drawer.classList.add('open');
                        backdrop.classList.add('show');
                        document.body.style.overflow = 'hidden';
                    }
                });
            }

            const closeFooterBtn = document.getElementById('closeDrawerFooter');
            if (closeFooterBtn) {
                closeFooterBtn.addEventListener('click', function() {
                    const drawer = document.getElementById('bottom-drawer');
                    const backdrop = document.getElementById('drawer-backdrop');
                    if (drawer && backdrop) {
                        drawer.classList.remove('open');
                        backdrop.classList.remove('show');
                        document.body.style.overflow = '';
                    }
                });
            }
        };
    </script>
@endpush
