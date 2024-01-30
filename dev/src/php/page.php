<!-- Post -->
<article id="single-article"
	class="relative flex flex-col min-w-0 my-5 break-words border-0 border-gray-200 rounded bg-pth dark:bg-htm border-1">

	<!-- Load Bludit Plugins: Page Begin -->
	<?php Theme::plugins('pageBegin'); ?>
	<?php if (!$page->isStatic() && !$url->notFound()): ?>
		<!-- Post Header -->
		<?php include(THEME_DIR_PHP . 'components/post-header.php'); ?>
		<!-- Page description -->
		<?php if ($page->description()): ?>
			<p class="page-description"><?php echo $page->description(); ?></p>
		<?php endif ?>
		<!-- Full content -->
		<?php echo $page->content(); ?>
		</div>
		</div>
		<script>
window.addEventListener('DOMContentLoaded', (event) => {
 const article = document.getElementById("single-article");
 const headings = article.querySelectorAll("h2, h3");
 const toc = document.getElementById("toc");
 const totalHeadings = headings.length;
 
 let tocOl = document.createElement("ol");
 let tocFragment = new DocumentFragment();
 let mainLi = null;
 let subUl = null;
 let subLi = null;
 let isSibling = false;

if(totalHeadings > 1) {
for (let element of headings) {
    let anchor = document.createElement("a");
    let anchorText = element.innerText;
    anchor.innerText = anchorText;
    let elementId = anchorText.replaceAll(" ", "-").toLowerCase();
    anchor.href = "#" + elementId;
    element.id = elementId;
    let level = element.nodeName;

    if ("H3" === level) {
        if (mainLi) {
            subLi = document.createElement("li");
            subLi.appendChild(anchor);

            if (isSibling === false) {
                subUl = document.createElement("ul");
            }
            subUl.appendChild(subLi);
            mainLi.appendChild(subUl);

            isSibling = true;
        }
    } else {
        mainLi = document.createElement("li");
        mainLi.appendChild(anchor);
        tocFragment.appendChild(mainLi);
        isSibling = false;
        subUl = null;
    }
}
tocOl.append(tocFragment);
toc.append(tocOl);
} else {
	toc.style.display = "none";
}
});
</script>
	<?php elseif ($url->notFound()): ?>
		<?php include(THEME_DIR_PHP . 'components/404.php'); ?>
	<?php elseif ($page->isStatic()): ?>
		<?php include(THEME_DIR_PHP . 'components/post-header.php'); ?>
		<!-- Page description -->
		<?php if ($page->description()): ?>
			<p class="page-description"><?php echo $page->description(); ?></p>
		<?php endif ?>
		<!-- Full content -->
		<?php echo $page->content(); ?>
		</div>
		</div>
	<?php endif ?>
	<!-- Load Bludit Plugins: Page End -->
	<?php Theme::plugins('pageEnd'); ?>

</article>
