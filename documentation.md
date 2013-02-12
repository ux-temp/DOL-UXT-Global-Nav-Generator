#ux-domain-menu is the outer most div used by the UX template. This section declares the global/domain navigation section of the template (gray bar).

The fist item is this section should if there is any global navigation is the navigational skip anchor for accessibility.

If there is any navigation, the HTML5 <nav> tag should then be cleared. If there is only one level the element only requires the classes of class="container_16 ux-content nav-level-1". If there is going to be any instance of a second level, the id of "app-nav" must be declared. This id flags the ux-object to load the application menu Javascript.

Example of level one only nav:

<pre>
<nav class="container_16 ux-content nav-level-1"> ... </nav>
</pre>

Example of more than one level nav:

<pre>
<nav class="container_16 ux-content nav-level-1" id="app-nav"> ... </nav>
</pre>

Every nav object has a un-ordered list inside of it. And each list item (<li>) is wrapped inside of an anchor (<a>).

Example:
<pre>
<nav class="container_16 ux-content">
	<ul>
		<li>
			<a href="#">Sub-Section 1.1</a>
		</li>
	</ul>
</nav>
</pre>

If an item will open a sub item on click, simply create a <div> right after the anchor tag. inside this new <div>. This new div will also have to have the class of "sub-nav". If they this is the second level of navigation, then the call of "outer-sub-nav" should be added, if its the third level the class should instead be "outer-sub-nav-2"

Directly inside the newly created <div>, another <nav> tag must be created. This is where the next unordered list should appear. After the first level, the classes of "container_16 ux-content group" should appear on every addtional <nav> element used.

Example:
<pre>
<nav class="container_16 ux-content"> <--- Level 1
	<ul>
		<li> 
			<a href="#">Sub-Section 1.1</a>
			<div class="sub-nav outer-sub-nav">
				<nav class="container_16 ux-content"> <--- Level 2
					<ul>
						<li>
							<a href="#">...</a>
							<div class="sub-nav outer-sub-nav-2">
								<nav class="container_16 ux-content group"> <--- Level 3
										...
								</nav>
							</div>
						</li>
					</ul>
				</nav>
			</div>
		</li>
	</ul>
</nav>
</pre>

Once at that the third the menu brakes into the column process. Here it is recommended to only to have 4 columns but there is no technical limitation other than the max page width. Inside the nav each column is broken out by using a <div> with the class of "menu-column". Inside each <div> is the standard unorder list and list item used before. The only acception here is columns can have what we are calling header item. Instead of the standard anchor tag, developers can use the <strong> tag to give a list item more font weight to designate that it is a header. At this time header are not links.

Example

<pre>

<div class="sub-nav outer-sub-nav-2">
	<nav class="container_16 ux-content group"> <--- Level 3
			<div class="menu-column">
				<ul>
					<li><strong>Header Item</strong></li>
					<li><a>Nav Link 1</a></li>
					<li><a>Nav Link 2</a></li>
					<li><a>Nav Link 3</a></li>
					<li><a>Nav Link 4</a></li>
				</ul>
			</div>

			...

			<div class="menu-column">
				<ul>
					<li><strong>Header Item</strong></li>
					<li><a>Nav Link 1</a></li>
					<li><a>Nav Link 2</a></li>
					<li><a>Nav Link 3</a></li>
					<li><a>Nav Link 4</a></li>
				</ul>
			</div>
	</nav>
</div>

</pre>
