<!-- Modal -->
<div class="modal fade" id="createUser">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('user.store') }}" method="post" id="store-form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createLabel">Tambah {{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="nameInput"
                            name="name" placeholder="Masukkan nama..." value="{{ old('name') }}" required>
                    </div>
                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="Masukkan email..." value="{{ old('email') }}" required>
                    </div>
                    <!-- Username -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" class="form-control" name="username" placeholder="Masukkan username..." value="{{ old('username') }}" required>
                    </div>
                    <!-- gender -->
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender" value="{{ old('gender') }}" required>
                            <option value="1">Laki-laki</option>
                            <option value="0">Perempuan</option>
                        </select>
                    </div>
                    <!-- Phone -->
                    <div class="form-group">
                        <label for="phone">Kontak</label>
                        <input type="text" id="phone" class="form-control" name="phone" placeholder="Kontak (No. HP / Whatsapp)" value="{{ old('phone') }}" required>
                    </div>
                    @if(Auth::user()->access == "head")
                    <!-- Access -->
                    <div class="form-group">
                        <label for="access">Hak Akses</label>
                        <select class="form-control" id="access" name="access" value="{{ old('access') }}" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                            <option value="head">Pimpinan</option>
                        </select>
                    </div>
                    @endif

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password..."
                            name="password" value="{{ old('password') }}" required>
                        <div class="invalid-feedback" id="feedback-password"></div>
                    </div>

                    <!-- Confirm -->
                    <div class="form-group">
                        <label for="confirm">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm" placeholder="Confirm password..."
                            name="confirm" required>
                        <div class="invalid-feedback" id="feedback-confirm"></div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">Reset</button>
            </form>
            <a class="btn btn-primary" onclick="store()" >Save Changes</a>
            </div>
        </div>
    </div>
</div>



@push('after-script')
<script>
    function isCharacterALetter(char) {
        return (/^[A-Za-z]+$/).test(char);
    }

    function store() {
        let $user = document.getElementById('nameInput').value;
        let $pass = document.getElementById('password').value;
        let $confirm = document.getElementById('confirm').value;
        let $form = document.getElementById('store-form');
        let $countPass = String($pass).length;

        console.log(isCharacterALetter($user));

        if ($countPass < 8) {
            console.log($countPass < 8);
            document.getElementById('password').classList.add('is-invalid');
            document.getElementById('feedback-password').innerHTML = 'Password minimal 8 karakter!';
        } else {
            if ($confirm === $pass) {
                $form.submit();
            } else {
                document.getElementById('password').classList.add('is-invalid');
                document.getElementById('feedback-password').innerHTML = 'Password tidak cocok!';
                document.getElementById('confirm').classList.add('is-invalid');
                document.getElementById('feedback-confirm').innerHTML = 'Ulangi konfirmasi password!';
            }
        }
    }

</script>
@endpush
