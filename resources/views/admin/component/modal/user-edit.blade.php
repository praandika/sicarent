<!-- Modal -->
@foreach($data as $o)
<div class="modal fade" id="editUser{{ $o->id }}">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('user.update') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $o->id }}Label">Edit {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="{{ $o->id }}">
                <!-- Name -->
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" id="name" class="form-control" value="{{ $o->name }}" placeholder="Masukkan name..." name="name">
                </div>
                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" class="form-control" value="{{ $o->email }}" placeholder="Masukkan email..." name="email">
                </div>
                <!-- Username -->
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" class="form-control" value="{{ $o->username }}" placeholder="Masukkan username..." name="username">
                </div>
                <!-- gender -->
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" placeholder="Pilih gender..." name="gender">
                        @if($o->gender == 1)
                        <option value="1">Laki-laki</option>
                        <option value="0">Perempuan</option>
                        @else
                        <option value="0">Perempuan</option>
                        <option value="1">Laki-laki</option>
                        @endif
                    </select>
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label for="phone">Kontak</label>
                    <input type="text" id="phone" class="form-control" value="{{ $o->phone }}" placeholder="Kontak (WA / No. Telp)" name="phone">
                </div>
                <!-- Access -->
                <div class="form-group">
                    <label for="access">Hak Akses</label>
                    <select class="form-control" id="access" placeholder="Pilih hak akses..." name="access">
                        @if($o->access == "admin")
                        <option value="{{ $o->access }}">{{ ucwords($o->access) }}</option>
                        <option value="head">Pimpinan</option>
                        <option value="user">User</option>
                        @elseif($o->access == "head")
                        <option value="{{ $o->access }}">{{ ucwords($o->access) }}</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                        @else
                        <option value="{{ $o->access }}">{{ ucwords($o->access) }}</option>
                        <option value="admin">Admin</option>
                        <option value="head">Pemimpin</option>
                        @endif
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>

            </form>
        </div>
    </div>
</div>
@endforeach
