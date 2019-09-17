<?php if (isset($_SERVER['HTTP_REFERER'])): ?>
  <section class="next full-bleed full-bleed--fill-green">
      <div class="constraint">
        <a href="<?php echo $_SERVER[
            "HTTP_REFERER"
        ]; ?>" class="next__link next__link--back">
          Zurück
        </a>
      </div>
  </section>
<?php endif; ?>
