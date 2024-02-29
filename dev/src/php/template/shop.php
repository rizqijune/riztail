<?php
$categoryKey = 'shop';
$category = getCategory($categoryKey);
    ?>
    <div>
        <h2 class="max-w-lg mt-6 mb-6 font-sans text-3xl font-bold tracking-tight sm:mt-0 sm:text-4xl sm:leading-none">
            Shop
        </h2>
    </div>
    <div class="grid content-center grid-cols-2 gap-4 place-content-center">
    <?php if (count($category->pages()) > 0):
        ?>
       <?php include(THEME_DIR_PHP . 'template/shop/modal.php'); ?>
        <?php foreach ($category->pages() as $pageKey):
            $shop = new Page($pageKey);
            $tags = $shop->tags(true);
            ?>
            <?php include(THEME_DIR_PHP . 'template/shop/card.php'); ?>
        <?php endforeach;?>
    </div>
<?php endif; ?>

<script>
    function openModal(title, tagz, img, alt) {
    var modal = document.getElementById('modal');
    var modalTitle = document.getElementById('modalTitle');
    var modalImage = document.getElementById('modalImage');
    var modalTag = document.getElementById('modalTag');

    modalTitle.textContent = title;
    modalImage.alt = alt;

    // Check if img is defined and not empty
    if (img && img.trim() !== "") {
        // Set the src attribute of modalImage
        modalImage.src = img;
    } else {
        // Set a default image or hide the image element
        modalImage.src = 'path/to/default-image.jpg'; // Replace 'path/to/default-image.jpg' with the path to your default image
        // Alternatively, you can hide the image element
        // modalImage.style.display = 'none';
    }

    // Split the description string by comma to get individual tags
    var tags = tagz.split(', ');
    // Generate span elements for each tag
    modalTag.innerHTML = '';
    tags.forEach(function(tag) {
        var span = document.createElement('span');
        span.textContent = tag;
        span.className = 'inline-block px-2 py-1 text-sm font-semibold text-gray-800 bg-gray-200 rounded-full mr-2 mb-2';
        modalTag.appendChild(span);
    });

    modal.classList.remove('hidden');
}

function hideModal() {
    var modal = document.getElementById('modal');
    modal.classList.add('hidden');
}

</script>
<script>
        function onImageLoad() {
            var skeletonLoaders = document.getElementsByClassName('skeleton-loader');
            for (var i = 0; i < skeletonLoaders.length; i++) {
                skeletonLoaders[i].style.display = 'none';
            }
            var realImages = document.getElementsByClassName('real-image');
            for (var i = 0; i < realImages.length; i++) {
                realImages[i].classList.remove('hidden');
            }
        }
        document.addEventListener("DOMContentLoaded", function() {
        var lazyImages = [].slice.call(document.querySelectorAll(".real-image"));
        if ("IntersectionObserver" in window) {
            var lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var lazyImage = entry.target;
                        lazyImage.src = lazyImage.dataset.src;
                        lazyImageObserver.unobserve(lazyImage);
                    }
                });
            });
            lazyImages.forEach(function(lazyImage) {
                lazyImageObserver.observe(lazyImage);
            });
        } else {
            // For browsers that do not support IntersectionObserver
            lazyImages.forEach(function(lazyImage) {
                lazyImage.src = lazyImage.dataset.src;
            });
        }
    });
    </script>


