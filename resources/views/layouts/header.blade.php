<div class="header">
    <div class="logo">
        
    </div>

    <div class="account-title">
        <h5 style="color: black;">{{Auth::user()->roles[0]->role}}</h5>
        <div class="dropdown" style="margin-left: 30px;">
            <a class="btn dropdown-toggle" style="background-color: #212529; color: white;" href="#" role="button"
                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            </a>


            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" href=""
                    onclick="event.preventDefault();">
                    Logout
                </a>

                {{-- <a class="dropdown-item" href="{{ route('user.profil.view') }}">
                Profil
            </a> --}}

                <form id="logout-form" action="{{route('user.logout')}}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Logout sekarang?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn2" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn1"
                        onclick="document.getElementById('logout-form').submit();">Logout</button>
                </div>
            </div>
        </div>
    </div>
</div>
