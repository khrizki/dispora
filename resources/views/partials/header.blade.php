<div class="info-banner">
    @if (!empty($pengumuman))
        <marquee style="color: red;" behavior="scroll" direction="left" scrollamount="5">
            🔴 Sedang berlangsung: {{ $pengumuman->judul_pengumuman }}
            | Lokasi: {{ $pengumuman->isi_pengumuman }}
            | Waktu: {{ \Carbon\Carbon::parse($pengumuman->jam)->format('H.i') }} -
            {{ \Carbon\Carbon::parse($pengumuman->jam_selesai)->format('H.i') }} WIB
        </marquee>
    @endif
</div>
