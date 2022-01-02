<form method="POST" enctype="multipart/form-data" id="logo" action="{{ route('upload.picture') }}">
    @csrf
    <div class="row">

        <div class="col-md-12">
            <div class="form-group">
                <input type="file" name="logo" placeholder="Choose image" id="logo">
                @error('logo')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</form>
