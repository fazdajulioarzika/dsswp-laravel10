<script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
<script src="{{ asset('assets/js/soft-ui-dashboard-tailwind.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>


<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/TextPlugin.min.js"></script>

<script src="https://unpkg.com/split-type"></script>
<script>
    gsap.registerPlugin(TextPlugin);
    gsap.to('.developer', {
        duration: 2,
        delay: 1.5,
        text: 'Web Developer'
    });
    gsap.from('.down', {
        duration: 1,
        y: -100,
        opacity: 0,
    });
    gsap.from('.toright', {
        duration: 1,
        x: -100,
        opacity: 0
    });
    gsap.from('.up', {
        duration: 1,
        y: 100,
        opacity: 0
    });
    gsap.from('.tright', {
        duration: 0.5,
        x: -30,
        opacity: 0
    });
</script>
