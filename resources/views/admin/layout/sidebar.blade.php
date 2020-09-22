<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar-->
    <section class="sidebar">
        <div id="menu" role="navigation">
            <ul class="navigation">
                @if (auth()->user()->role == 'admin')
                <li >
                    <a href="{{Route('product.index')}}">
                        <i class="menu-icon ti-desktop"></i>
                        <span class="mm-text ">Product</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.index')}}">
                        <i class="menu-icon ti-layout-list-large-image"></i>
                        <span class="mm-text ">User</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('report.index')}}">
                        <i class="menu-icon ti-layout-list-large-image"></i>
                        <span class="mm-text ">Report</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('variant.index')}}">
                        <i class="menu-icon ti-layout-list-large-image"></i>
                        <span class="mm-text ">Variant</span>
                    </a>
                </li>
                @endif
                {{-- <li>
                    <a href="{{route('meja.index')}}">
                        <i class="menu-icon ti-layout-list-large-image"></i>
                        <span class="mm-text ">Table</span>
                    </a>
                </li> --}}
                <li >
                    <a href="{{route('kasir.index')}}">
                        <i class="menu-icon ti-layout-list-large-image"></i>
                        <span>Add Order</span>
                    </a>
                </li>
                <li >
                    <a href="/order/pending">
                        <i class="menu-icon ti-layout-list-large-image"></i>
                        <span>Order</span>
                        
                    {{-- </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="/order/pending">
                                Pending
                            </a>
                        </li>

                        
                    </ul> --}}
                    </a>
                </li>
            </ul>
            <!-- / .navigation --> </div>
        <!-- menu --> </section>
    <!-- /.sidebar --> </aside>