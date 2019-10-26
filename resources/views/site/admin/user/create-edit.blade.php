<form id="frm-user" method="POST" class="card form-type-combine" action="{{ isset($user) ? route('user.update', ['user' => $user->id]) : route('user.store') }}">
    @isset($user)
        {{method_field('PUT')}}
    @endisset
    <div class="card-body">

        <div class="form-groups-attached">
            <div class="row">
                <div class="form-group col-12 col-lg-6">
                    <label>{{ __('Nombre') }}</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name', isset($user) ? $user->name : null) }}" required="required">
                </div>

                <div class="form-group col-12 col-lg-6">
                    <label>{{ __('Email') }}</label>
                    <input class="form-control" type="email" name="email" value="{{ old('name', isset($user) ? $user->email : null) }}" required="required">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-12 col-lg-6">
                    <label>{{ __('Contraseña') }}</label>
                    <input id="password" class="form-control" type="password" name="password" {{!isset($user) ? 'required=required' : null}}>
                </div>

                <div class="form-group col-12 col-lg-6">
                    <label>{{ __('Confirmar Contraseña') }}</label>
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation">
                </div>
            </div>
        </div>

    </div>

    <footer class="card-footer text-right">
        <button class="btn btn-primary" type="submit">Guardar</button>
    </footer>
</form>

<script src="{{ asset('js/jquery-validation/jquery.validate.js') }}"></script>
<script>
    var form = $('#frm-user');
    var url = form.attr('action');

    form.validate({
        rules: {
            name: 'required',
            email: {
                email: true,
                required: true
            },
            password_confirmation: {
                equalTo: '#password'
            }
        },
        submitHandler: function() {
            $.post(url, form.serialize()).done(function() {
                oTable.draw();
            }).fail(function(response) {

            });
        }
    });
</script>



