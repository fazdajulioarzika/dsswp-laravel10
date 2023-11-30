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
<script>
    // Sample data for demonstration purposes
    const totalItems = 20; // Replace with your total number of items
    const itemsPerPage = 5; // Replace with the desired items per page

    // Calculate the total number of pages
    const totalPages = Math.ceil(totalItems / itemsPerPage);

    // Function to generate pagination links
    function generatePaginationLinks() {
        const paginationElement = document.getElementById('pagination');
        paginationElement.innerHTML = ''; // Clear existing links

        for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.href = '#';
            a.textContent = i;

            // Attach an event listener to each pagination link
            a.addEventListener('click', function() {
                // Replace this function with your logic to fetch and display the items for the selected page
                console.log(`Page ${i} clicked. Implement your logic here.`);
            });

            li.appendChild(a);
            paginationElement.appendChild(li);
        }
    }

    // Initial call to generate pagination links
    generatePaginationLinks();
</script>
