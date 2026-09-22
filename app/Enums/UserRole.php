<?php

namespace App\Enums;

enum UserRole: string
{
    case DIREKSI = 'direksi';
    case MARKETING = 'marketing';
    case KEUANGAN = 'keuangan';
    case ADMINISTRASI = 'administrasi';
    case KURIKULUM = 'kurikulum';
    case STAFF = 'staff';
    case GUEST = 'guest';
    case CSO = 'cso';
    case SUPERADMIN = 'superadmin';

    public function label(): string
    {
        return match ($this) {
            self::DIREKSI => 'Direksi',
            self::MARKETING => 'Marketing',
            self::KEUANGAN => 'Keuangan',
            self::ADMINISTRASI => 'Administrasi',
            self::KURIKULUM => 'Kurikulum',
            self::STAFF => 'Staff',
            self::GUEST => 'Tamu (Guest)',
            self::CSO => 'CSO',
            self::SUPERADMIN => 'Superadmin',
        };
    }

    public static function labels(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $role) => [$role->value => $role->label()])
            ->all();
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
