<form id="frm-user" method="POST" class="card form-type-combine" action="{{ isset($user) ? route('user.update', ['user' => $user->id]) : route('user.store') }}">
    @isset($user)
        {{method_field('PUT')}}
    @endisset
    <div class="card-body">

        <div class="form-groups-attached">
            <div class="row">
                <div class="col-md-6">
                    <label for="">Imagen</label>
                    <input id="user_perfil" data-provide="dropify" style="box-sizing: inherit!important;" type="file" @if(isset($user))data-default-file="{{count($user->getMedia('avatars'))>0 ?  $user->getMedia('avatars')->first()->getFullUrl():null}}" @endif name="avatar" data-height="160" data-max-width="15000" data-min-width="10" />


                </div>

{{--                @if(isset($user) && count($user->getMedia('videos'))>0)--}}
{{--                    <div class="col-md-6">--}}
{{--                        <video height="300" width="300" autoplay controls>--}}
{{--                            <source src="{{count($user->getMedia('videos'))>0 ?  $user->getMedia('videos')->first()->getFullUrl():null}}" type="video/mp4">--}}
{{--                        </video>--}}
{{--                    </div>--}}
{{--                @else--}}
{{--                    <div class="col-md-6">--}}
{{--                        <label for="">Video</label>--}}
{{--                        <input id="user_video" data-provide="dropify" style="box-sizing: inherit!important;" type="file"  name="video" data-height="160" data-max-width="15000" data-min-width="10" />--}}
{{--                    </div>--}}
{{--                @endif--}}
                <div class="form-group form-type-combine col-12">
                    <label for="role">{{ __('Rol') }}</label>

                    <select id="role" class="form-control" name="role" data-provide="selectpicker">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">

                <div class="form-group col-12 col-lg-6">
                    <label>{{ __('Nombre') }}</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ old('name', isset($user) ? $user->name : null) }}" required="required">
                    <div class="help-block"></div>
                </div>

                <div class="form-group col-12 col-lg-6">
                    <label>{{ __('Email') }}</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('name', isset($user) ? $user->email : null) }}" required="required">
                    <div class="help-block"></div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-12 col-lg-6">
                    <label>{{ __('Contraseña') }}</label>
                    <input id="password" class="form-control" type="password" name="password" {{!isset($user) ? 'required=required' : null}}>
                    <div class="help-block"></div>
                </div>

                <div class="form-group col-12 col-lg-6">
                    <label>{{ __('Confirmar Contraseña') }}</label>
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation">
                    <div class="help-block"></div>
                </div>
            </div>
        </div>

    </div>

    <footer class="card-footer text-right">
        <button class="btn btn-primary" id="btn-submit-form" type="submit" >Guardar</button>
    </footer>
</form>

<script src="{{ asset('js/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('js/template/validator.notifications.js') }}"></script>

<script>

        @if(isset($user))
    var url = " {{route('user.update',['user'=>$user->getId()])}} ";
        @else
    var url = " {{route('user.store')}} ";
        @endif
    var form = $('#frm-user');
    // var url = form.attr('action');

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
            // var data = $( "#user_form" ).serialize();
            var formData = new FormData($('#frm-user')[0]);
            // var number_file=0;
            // $.each( $('input[type=file]')[0].files, function () {
            //     formData.append('file_'+number_file, $('input[type=file]')[0].files[number_file]);
            //     number_file++;
            // });

            $.ajax({
                method: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,

                url: url,
                success: function (oResponse) {
                    oTable.draw(false);
                    $('#btn-submit-form').parents('.modal_father').iziModal('close');
                }
            });
            // $.post(url, form.serialize()).done(function() {
            //     oTable.draw();
            //     $('#modal').iziModal('close');
            // })
        }
    });


</script>
