<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\StatistikPengunjung;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatistikPengunjungTest extends TestCase
{

    public function test_pengunjung_baru_ditambahkan_jika_belum_ada_di_hari_yang_sama()
    {
        $ip = '192.168.1.1';
        $userAgent = 'Mozilla/5.1';

        // Simulasikan request pertama
        $this->postJson('/', [
            'ip_address' => $ip,
            'user_agent' => $userAgent,
        ]);

        $this->assertDatabaseHas('statistik_pengunjungs', [
            'ip_address' => $ip,
            'user_agent' => $userAgent,
        ]);
    }

    public function test_pengunjung_tidak_ditambahkan_dua_kali_di_hari_yang_sama()
    {
        $ip = '192.168.1.1';
        $userAgent = 'Mozilla/5.1';

        // Simulasikan request pertama
        StatistikPengunjung::create([
            'ip_address' => $ip,
            'user_agent' => $userAgent,
            'visited_at' => now(),
        ]);

        // Simulasikan request kedua di hari yang sama
        $this->postJson('/', [
            'ip_address' => $ip,
            'user_agent' => $userAgent,
        ]);

        // Pastikan hanya ada satu entri
        $this->assertEquals(1, StatistikPengunjung::where('ip_address', $ip)
            ->where('user_agent', $userAgent)
            ->whereDate('visited_at', now()->toDateString())
            ->count());
    }

    public function test_pengunjung_ditambahkan_kembali_di_hari_berbeda()
    {
        $ip = '192.168.1.1';
        $userAgent = 'Mozilla/5.1';

        // Simulasikan request pertama
        StatistikPengunjung::create([
            'ip_address' => $ip,
            'user_agent' => $userAgent,
            'visited_at' => now()->subDay(),
        ]);

        // Simulasikan request di hari berikutnya
        $this->postJson('/', [
            'ip_address' => $ip,
            'user_agent' => $userAgent,
        ]);

        // Pastikan ada dua entri
        $this->assertEquals(1, StatistikPengunjung::where('ip_address', $ip)
            ->where('user_agent', $userAgent)
            ->whereDate('visited_at', now()->toDateString())
            ->count());
    }
}
