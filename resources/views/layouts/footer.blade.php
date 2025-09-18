<footer class="content-footer footer bg-footer-theme">
  <div class="container-xxl">
    <div class="footer-container d-flex align-items-center justify-content-between py-3 flex-md-row flex-column">
      
      <!-- Kiri -->
      <div class="text-body">
        © {{ date('Y') }} 
        <span class="fw-bold">Wisataku</span>. All rights reserved.
      </div>

      <!-- Kanan -->
      <div class="d-none d-lg-inline-block">
        <a href="{{ url('/about') }}" class="footer-link me-4">Tentang Kami</a>
        <a href="{{ url('/privacy-policy') }}" class="footer-link me-4">Kebijakan Privasi</a>
        <a href="{{ url('/terms') }}" class="footer-link me-4">Syarat & Ketentuan</a>
        <a href="{{ url('/support') }}" class="footer-link d-none d-sm-inline-block">Bantuan</a>
      </div>
    </div>
  </div>
</footer>
