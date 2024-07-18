function changeTheme(event) {
    document.documentElement.classList.toggle("dark");
  }

  // FUNCTION ZOOM TXT

  const zoomRange = document.getElementById('zoomRange');
        const zoomTargets = document.querySelectorAll('.zoom-target');

        zoomRange.addEventListener('input', function() {
            const zoomLevel = zoomRange.value;
            zoomTargets.forEach(target => {
                target.style.transform = `scale(${zoomLevel})`;
            });
        });

        zoomTargets.forEach(target => {
            target.addEventListener('mouseenter', function() {
                target.classList.add('zoomed');
            });

            target.addEventListener('mouseleave', function() {
                target.classList.remove('zoomed');
            });
        });