<aside class="main-sidebar {{ session('sidebarLeftTheme', 'sidebar-dark-danger elevation-4') }}">
    <!-- Brand Logo -->
    <a href="{{ route('page.index') }}" class="brand-link">
        <img src="{{ asset('vendors/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <x-library :library='auth()->user()->library' class="img-circle elevation-2" />
            </div>
            <div class="info">
              <a href="{{ route('user.show', auth()->id()) }}" class="d-block">{{ auth()->user()->full_name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-compact" data-widget="treeview"
                role="menu" data-accordion="false">
                
                <li class="nav-item">
                    <a data-attr="menu-open" data-class="active" href="{{ route('page.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Tableau de bord</p>
                    </a>
                </li>

                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-cog"></i>
                      <p>
                        Paramettres
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('society.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-building"></i>
                                <p>Société</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('staff_type.index') }}" class="nav-link">
                                <i class=" nav-icon fas fa-list-alt" aria-hidden="true"></i>
                                <p>Types de staff</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('conversion.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Unités de mesure</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('study_level.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Niveaux d'étude</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('contract_type.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Types de contrat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('currency.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-euro-sign    "></i>
                                <p>Devises</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('vat.index') }}" class="nav-link">
                                <i class="nav-icon fa fa-percent" aria-hidden="true"></i>
                                <p>TVAs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('discount.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-handshake"></i>
                                <p>Remises</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('exercise.index') }}" class="nav-link">

                                <i class="nav-icon fa fa-calendar" aria-hidden="true"></i>
                                <p>Exercices</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('work.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-suitcase"></i>
                                <p>Fonctions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('product_ray.index') }}" class="nav-link">
                                <i class="nav-icon fa fa-list-ol"></i>
                                <p>Rayons de produit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('product_category.index') }}" class="nav-link">
                                <i class="nav-icon fa fa-list-ol"></i>
                                <p>Catégories de produit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('product_type.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-list-ol"></i>
                                <p>Types de produit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('person_ray.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-list-alt"></i>
                                <p>Types de fournisseur/client</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('bank.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>Banques</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('cash_register.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Caisses</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('cash_register_operation_type.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Types d'opération de caisse</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('bank_operation_type.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Types d'opération de banque</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-list"></i>
                      <p>
                        Activités
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('agency.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-cubes"></i>
                                <p>Agences</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('sale_place.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-sitemap"></i>
                                <p>Points de vente</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('staff.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Staffs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('agency_staff.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Agences & Staffs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('sale_place_staff.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Points de vente & Staffs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('role_user.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Rôles & Utilisateurs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('exercise_product.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Exercices & Produits</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('day_transaction.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-cubes"></i>
                                <p>Transactions de journée</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('cash_register_transaction.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-cubes"></i>
                                <p>Transactions de caisse</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('cash_register_operation.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Opérations de caisse</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('bank_operation.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Opérations de banque</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('provider.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-truck"></i>
                                <p>Fournisseurs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('customer.index') }}" class="nav-link">
                                <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                                <p>Clients</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('product.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>Produits</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('purchase.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>Commandes fournisseur</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('supply.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-shopping-basket"></i>
                                <p>Approvisionnements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('proforma.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>Proformas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('order.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-shopping-bag"></i>
                                <p>Commandes client</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('purchase_delivery_note.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-shopping-bag"></i>
                                <p>Réceptions fournisseur</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('order_delivery_note.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-shopping-bag"></i>
                                <p>Livraisons client</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-user"></i>
                      <p>
                        Caisses
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('quick_sale.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-shopping-bag"></i>
                                <p>Ventes rapide</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('purchase_payment.index') }}" class="nav-link">
                                <i class="nav-icon fa fa-calendar" aria-hidden="true"></i>
                                <p>Payements fournisseur</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('order_payment.index') }}" class="nav-link">
                                <i class="nav-icon fa fa-calendar" aria-hidden="true"></i>
                                <p>Payements client</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-database"></i>
                      <p>
                        Utilitaires
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('page.backups') }}" class="nav-link">
                                <i class="nav-icon fa fa-calendar" aria-hidden="true"></i>
                                <p>Sauvegarde des données</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('transaction.index') }}" class="nav-link">
                                <i class="nav-icon fa fa-calendar" aria-hidden="true"></i>
                                <p>Pistes d'audit</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-list-alt"></i>
                      <p>
                        Outils
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('settings.index') }}" class="nav-link">
                                <i class="nav-icon fa fa-calendar" aria-hidden="true"></i>
                                <p>Parametres</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-info-circle"></i>
                      <p>
                        Aides
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('page.doc') }}" class="nav-link">
                                <i class="nav-icon fa fa-calendar" aria-hidden="true"></i>
                                <p>Documentation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('page.licence') }}" class="nav-link">
                                <i class="nav-icon fa fa-calendar" aria-hidden="true"></i>
                                <p>Licence</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-attr="menu-open" data-class="active" href="{{ route('page.about') }}" class="nav-link">
                                <i class="nav-icon fa fa-calendar" aria-hidden="true"></i>
                                <p>A propos</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>

    </div>
    <!-- /.sidebar -->
</aside>