let currentIndex = 0;

function moveSlider(direction) {
    const container = document.querySelector('.category-container');
    const items = document.querySelectorAll('.category-item');
    let itemsToShow = 6; // Default: 6 items visible for larger screens

    // Dynamically set number of items to show based on the screen width
    if (window.innerWidth <= 768) {
        itemsToShow = 3; // 3 items visible on mobile
    } else if (window.innerWidth <= 1024) {
        itemsToShow = 4; // 4 items on tablets and smaller screens
    }

    const totalItems = items.length;

    if (totalItems <= itemsToShow) {
        // Disable navigation buttons if all items fit in the view
        document.querySelector('.slider-nav.prev').disabled = true;
        document.querySelector('.slider-nav.next').disabled = true;
        return;
    }

    // Calculate new index
    currentIndex += direction;

    // Ensure the index stays within bounds
    currentIndex = Math.max(0, Math.min(currentIndex, totalItems - itemsToShow));

    // Calculate the translation
    const translateX = -currentIndex * items[0].offsetWidth;

    // Apply transformation
    container.style.transform = `translateX(${translateX}px)`;

    // Update button states
    document.querySelector('.slider-nav.prev').disabled = currentIndex === 0;
    document.querySelector('.slider-nav.next').disabled = currentIndex >= totalItems - itemsToShow;
}

// Function to initialize the slider
function initializeSlider() {
    const container = document.querySelector('.category-container');
    const items = document.querySelectorAll('.category-item');

    if (!container || items.length === 0) return;

    // Reset index and position
    currentIndex = 0;
    container.style.transform = `translateX(0px)`;

    // Dynamically update navigation buttons
    moveSlider(0);
}

// Adjust slider on window resize
window.addEventListener('resize', initializeSlider);

// Initialize slider after DOM content is fully loaded
document.addEventListener('DOMContentLoaded', () => {
    initializeSlider();

    // Add event listeners for navigation buttons
    document.querySelector('.slider-nav.prev').addEventListener('click', () => moveSlider(-1));
    document.querySelector('.slider-nav.next').addEventListener('click', () => moveSlider(1));
});


// subcategory

document.addEventListener('DOMContentLoaded', function () {
    const categoryItems = document.querySelectorAll('.category-item');
    const subcategoriesCard = document.getElementById('subcategoriesCard');
    const subcategoriesList = document.getElementById('subcategoriesList');

    categoryItems.forEach(item => {
        item.addEventListener('mouseenter', function () {
            const categoryId = this.getAttribute('data-category-id');

            // Fetch subcategories using AJAX
            fetch(`/categories/${categoryId}/subcategories`)
                .then(response => response.json())
                .then(data => {
                    subcategoriesList.innerHTML = ''; // Clear existing subcategories
                    if (data.length > 0) {
                        data.forEach(subCategory => {
                            const listItem = document.createElement('li');
                            listItem.className = 'list-group-item';
                            listItem.textContent = subCategory.name;
                            subcategoriesList.appendChild(listItem);
                        });
                        subcategoriesCard.style.display = 'block'; // Show the card
                    } else {
                        subcategoriesList.innerHTML = '<li class="list-group-item">No subcategories found</li>';
                    }
                })
                .catch(error => console.error('Error fetching subcategories:', error));
        });
    });

    // Hide the card when not hovering on a category
    document.querySelector('.dropdown-menu').addEventListener('mouseleave', function () {
        subcategoriesCard.style.display = 'none';
    });
});
