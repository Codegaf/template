<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

//medialibrary
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use HasRoles;
    use HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getId(){
        return $this->id;
    }

//imagenes

//añadir las coleciones que tendra este modelo, el comportamiento y filtro
    public function registerMediaCollections()
    {

        $this->addMediaCollection('avatars')
            ->singleFile()
            ->useDisk('users_avatar')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpeg' || $file->mimeType === 'image/png';
            });

        $this->addMediaCollection('videos')
            ->useDisk('users_video')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'video/mp4';
            });

    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('user-thumb')
            ->width(60)
            ->height(60)
            ->sharpen(10);

    }





}

