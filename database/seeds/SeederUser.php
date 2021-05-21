<?php

use Illuminate\Database\Seeder;

class SeederUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement("
        //     delete from tb_user;
        // ");

        DB::statement("
            insert ignore into tb_user(
                id_user,
                username,
                email,
                password,
                user_group,
                nama,
                nip,
                jabatan,
                role
            )
            values
            ('0', 'admin', 'pa.batulicin@gmail.com', '$2y$10\$eyhZ1SUoIox1ad5ecgtQZO4bICf9pbjPZXnnna\/QNrYqCYqty5FrC', 'admin', 'Admin', '', '', ''),
            ('1', 'admin_surat', 'pa.batulicin@gmail.com', '$2y$10\$eyhZ1SUoIox1ad5ecgtQZO4bICf9pbjPZXnnna\/QNrYqCYqty5FrC', 'admin_surat', 'Admin Surat', '', '', ''),
            ('2', 'admin_emus', 'pa.batulicin@gmail.com', '$2y$10\$eyhZ1SUoIox1ad5ecgtQZO4bICf9pbjPZXnnna\/QNrYqCYqty5FrC', 'admin_emus', 'Admin Emus', '', '', ''),
            ('3', 'panitera', 'pa.batulicin@gmail.com', '$2y$10\$eyhZ1SUoIox1ad5ecgtQZO4bICf9pbjPZXnnna\/QNrYqCYqty5FrC', 'admin_emus', 'H. Yahyadi, S.H.', '197301122003121002', 'Panitera', 'panitera'),
            ('4', 'panmud_permohonan', 'pa.batulicin@gmail.com', '$2y$10\$eyhZ1SUoIox1ad5ecgtQZO4bICf9pbjPZXnnna\/QNrYqCYqty5FrC', 'admin_emus', 'Khomsiatun Maisaroh, S.H.', '198305042009042011', 'Panitera Muda Permohonan', 'panmud_permohonan'),
            ('5', 'panmud_gugatan', 'pa.batulicin@gmail.com', '$2y$10\$eyhZ1SUoIox1ad5ecgtQZO4bICf9pbjPZXnnna\/QNrYqCYqty5FrC', 'admin_emus', 'M. Kharis Ridhani, S.H., M.H.', '198709152006041002', 'Panitera Muda Gugatan', 'panmud_gugatan'),
            ('6', 'panitera_pengganti', 'pa.batulicin@gmail.com', '$2y$10\$eyhZ1SUoIox1ad5ecgtQZO4bICf9pbjPZXnnna\/QNrYqCYqty5FrC', 'admin_emus', 'Muzdalifah, S.H.I', '198905172014032004', 'Panitera Pengganti', 'panitera_pengganti'),
            ('7', 'panmud_hukum', 'pa.batulicin@gmail.com', '$2y$10\$eyhZ1SUoIox1ad5ecgtQZO4bICf9pbjPZXnnna\/QNrYqCYqty5FrC', 'admin_emus', 'Panitera Muda Hukum', '', 'Panitera Muda Hukum', 'panmud_hukum')
            ;
        ");
    }
}
