<footer class="footer" id="about">
  <div class="container footer-inner">

    <div class="footer-card">
      <h4>About</h4>
      <p>
        Nagham Blog is a space dedicated to sharing practical technology insights,
        development tips, and real-world solutions.
      </p>

      <div class="footer-links">
        <a class="footer-link" href="{{ route('posts') }}">All Posts</a>
        <a class="footer-link" href="{{ route('me') }}">Me</a>
        <a class="footer-link" href="#top">Back to top</a>
      </div>
    </div>

    <div class="footer-copy">
      © {{ date('Y') }} Nagham Blog. All rights reserved.
    </div>

  </div>
</footer>
