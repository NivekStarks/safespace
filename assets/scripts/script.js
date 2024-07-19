function changeTheme(event) {
    document.documentElement.classList.toggle("dark");
  }

  $(document).ready(function() {
    $(".zoomItem").click(function(evt) {
        evt.stopPropagation();
        evt.preventDefault();
        $(this).zoomTo({debug:true, nativeanimation:true});
    });
    
    $(window).click(function(evt) {
        evt.stopPropagation();
        $("body").zoomTo({targetsize:1.0, nativeanimation:true});
    });
    
    // for iPhone
    $("#container").click(function(evt) {
        evt.stopPropagation();
        $("body").zoomTo({targetsize:1.0, nativeanimation:true});
    });
    
    $("body").zoomTo({targetsize:1.0, nativeanimation:true});
});

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