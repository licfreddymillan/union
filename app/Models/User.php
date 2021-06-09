<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = "webp_users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dni', 'names', 'last_names', 'birthdate', 'gender', 'country', 'state', 'city', 'address',
        'phone', 'zip_code', 'user_login', 'user_pass', 'user_nicename', 'user_email', 'user_url',
        'user_registered', 'user_activation_key', 'user_status', 'display_name',  'password', 'avatar',
        'access_token', 'referred_id', 'sponsor_id', 'status_master', 'matrix_users', 'activado_permanente',
        'observacion_activacion', 'autorizacion_activacion', 'extendido', 'inactivado',
        'observacion_inactivacion', 'autorizacion_inactivacion', 'fecha_inactivacion',
        'observacion_caducado', 'autorizacion_caducado', 'restaurado', 'fecha_restauracion',
        'suscripcion_cancelada', 'reintegro_pendiente', 'fecha_reintegro', 'rol_id',
        'next_range_limit_date', 'wallet_amount', 'wallet_amount_life', 'wallet_btc', 'clave',
        'broker_id', 'trading_password', 'trading_password2', 'broker_server', 'commissions_wallet',
        'validar_correo', 'admin', 'comment_liquidation', 'profile', 'notificate_date', 'msj',
        'paquete', 'codigo_2fa', 'two_factor', 'code_2fa', 'universal', 'corporate', 'billing',
        'signals', 'pagos', 'amount_investment', 'risk_level', 'binary_sponsor', 'child_right_side',
        'child_left_side', 'side_new_child', 'directos_incompletos', 'ubicado_binario', 'binary_side',
        'binary_status', 'referred_active_left', 'referred_active_right', 'left_binary_points',
        'right_binary_points', 'left_binary_points_rank', 'right_binary_points_rank', 'interest_type',
        'capital_balance', 'first_payment', 'executives_left', 'executives_right', 'top_leaders_left',
        'top_leaders_right', 'premium_leaders_left', 'premium_leaders_right', 'platinum_left',
        'platinum_right', 'elites_platinum_left', 'elites_platinum_right', 'diamonds_left',
        'diamonds_right', 'double_diamonds_left', 'double_diamonds_right', 'blue_diamonds_left',
        'blue_diamonds_right', 'black_diamonds_left', 'black_diamonds_right', 'crown_diamonds_left',
        'crown_diamonds_right', 'paqueteUpoint', 'fecha_vencimiento_upoint', 'wallet_amount_proinvestor',
        'commissions_wallet_capital', 'activacion_fa', 'user_left', 'user_right'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
