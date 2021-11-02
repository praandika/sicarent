<!-- Modal -->
<div class="modal fade" id="createModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('user.store') }}" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Tambah {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Name -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                    </div>
                </div>
                <!-- Email -->
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                    </div>
                </div>
                <!-- Username -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                    </div>
                </div>
                <!-- gender -->
                <div class="form-group">
                    <select class="form-control" name="gender">
                        <option value="1">Laki-laki</option>
                        <option value="0">Perempuan</option>
                    </select>
                </div>

                <!-- Phone -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="phone" placeholder="Kontak (No. HP / Whatsapp)">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                    </div>
                </div>
                <!-- Address -->
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Alamat" name="address" placeholder="Alamat"></textarea>
                </div>
                <!-- Birthday -->
                <div class="input-group date mb-3" id="addbirthday" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#addbirthday" name="birthday" placeholder="Tanggal Lahir" />
                    <div class="input-group-append" data-target="#addbirthday" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>

                <!-- Access -->
                <div class="form-group">
                    <select class="form-control" name="access">
                        <option value="user">User</option>
                        <option value="user">Admin</option>
                        <option value="head">Pimpinan</option>
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>

            </form>
        </div>
    </div>
</div>
