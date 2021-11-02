<!-- Modal -->
@foreach($data as $o)
<div class="modal fade" id="editModal{{ $o->id }}">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('user.update') }}" method="POST">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $o->id }}Label">Edit {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Name -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{ $o->name }}" name="name">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                    </div>
                </div>
                <!-- Email -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{ $o->email }}" name="email">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                    </div>
                </div>
                <!-- Username -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{ $o->username }}" name="username">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                    </div>
                </div>
                <!-- gender -->
                <div class="form-group">
                    <select class="form-control" value="{{ $o->gender == '1' ? 'Laki-laki' : 'Perempuan' }}" name="gender">
                        @if($o->gender == '1')
                        <option value="0">Perempuan</option>
                        @else
                        <option value="1">Laki-laki</option>
                        @endif
                    </select>
                </div>

                <!-- Phone -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{ $o->phone }}" name="phone">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                    </div>
                </div>
                <!-- Address -->
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Alamat" name="address">
                        {{ $o->address }}
                    </textarea>
                </div>
                <!-- Birthday -->
                <div class="input-group date mb-3" id="editbirthday" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#editbirthday" name="birthday" placeholder="Tanggal Lahir" />
                    <div class="input-group-append" data-target="#editbirthday" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>

                <!-- Access -->
                <div class="form-group">
                    <select class="form-control" value="{{ $o->access }}" name="access">
                        @if($o->access == 'admin')
                        <option value="user">User</option>
                        <option value="head">Pimpinan</option>
                        @elseif($o->access == 'user')
                        <option value="user">Admin</option>
                        <option value="head">Pimpinan</option>
                        @else
                        <option value="user">Admin</option>
                        <option value="head">User</option>
                        @endif
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
@endforeach
