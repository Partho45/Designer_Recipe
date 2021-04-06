<style>
  
    a{
        font-weight: 700;
        border-bottom: 1px solid grey;
    }
</style>
<div class="sidebar">
    @if (Request::is('admin*'))
        <a class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"
        href="{{ route('admin.dashboard') }}">
        Dashboard
        </a>


        <a class="{{ Request::is('admin/category*') ? 'active' : '' }}"
                href="{{ route('admin.category.index') }}">
        Category
        </a>

        <a class="{{ Request::is('admin/recipe*') ? 'active' : '' }}"
                href="{{ route('admin.recipe.index') }}">
            Designs
        </a>

        <a class="{{ Request::is('admin/pending/recipe') ? 'active' : '' }}"
                href="{{ route('admin.recipe.pending') }}">
            Pending Designs
        </a>

        <a class="{{ Request::is('admin/memberlist*') ? 'active' : '' }}"
                href="{{ route('admin.memberlist.index') }}">
        Member List
        </a>


        <a class="{{ Request::is('admin/subscriber') ? 'active' : '' }}"
                href="{{ route('admin.subscriber.index') }}">
        Subscriber List
        </a>

        <a class="{{ Request::is('admin/profile*') ? 'active' : '' }}"
                href="{{ route('admin.profile') }}">
                 Profile Information
        </a>


        <a onclick="logout()">
        Log Out
        </a>

        <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        </form>        
    @endif


    @if (Request::is('member*'))

            <a class="{{ Request::is('member/dashboard') ? 'active' : '' }}"
                                             href="{{ route('member.dashboard') }}">
                       Dashboard
             </a>

             <a class="{{ Request::is('member/categories') ? 'active' : '' }}"
                href="{{ route('member.categories') }}">
                Categories
            </a>

             <a class="{{ Request::is('member/recipe*') ? 'active' : '' }}"
                href="{{ route('member.recipe.index') }}">
                Designs
            </a>

            <a class="{{ Request::is('member/pending/recipe') ? 'active' : '' }}"
                href="{{ route('member.recipe.pending') }}">
                Pending Designs
            </a>

             <a class="{{ Request::is('member/profile*') ? 'active' : '' }}"
                href="{{ route('member.profile') }}">
                 Profile Information
            </a>
            
          
             <a onclick="logout()">
                Log Out
            </a>

            <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
       <script type="text/javascript">
       function logout(){
           const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Are you sure to logout?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('logout').submit();
                } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
                ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                )
               }
            })
       } 
       </script>