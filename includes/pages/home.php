<div id="intro" class="container">
    <div class="contents">
        <div class="hello">
            <span>Yes hello.<span class="fade">¬</span></span>
        </div>
        <div class="introduction">
            <span>
                My name is Tasos, and I am a Full-Stack Web Developer based in Corfu, Greece.
                <br>
                <br>
                I create websites and interactive web applications from the ground up using leading technologies in the field such as PHP, MySQL and Javascript. From mockups to web design, development and testing, I make sure that an application is built with optimization and performance in mind, is deployed on a secure and robust environment and is friendly and appealing to the end-user, whether that is a systems' administrator or just a visitor.
                <br>
                On my free time I create 3D graphics and animations, and I also host my own online radioshow, among other things.
            </span>
        </div>
    </div>
</div>
<div id="social">
    <? $core->loadComponent("social-icons"); ?>
</div>
<div id="latest-articles"><? $posts = $core->getPosts(1) ?>
    <? foreach ($posts as $post): ?>
        <div class="article">
            <div class="title">
                <span><?=$post->title?></span>
            </div>
            <div class="description">
                <span><?=$post->description?></span>
            </div>
            <!-- <div class="bg">
                <img src="https://christianmoser.me/wp-content/uploads/2014/02/DSC_3415.jpeg" alt="">
            </div> -->
        </div>
    <? endforeach; ?>
    <div class="indicators">
        <div class="indicator active"></div>
        <div class="indicator"></div>
        <div class="indicator"></div>
    </div>
</div>
<div id="frontend" class="section">
    <div class="container">
        <div class="title">
            <span>Frontend</span>
        </div>
        <div class="description">
            <span>
                While creating a web application, the frontend will be the first thing the end-user will see once they arrive. A web app should be engaging, have interesting content and apparent structure, or else it will be difficult to navigate. I consider creating a highly efficient and maintainable user interface a big priority, therefore I ensure that the development environment has traits such as continous integration and compartmentalization. If any issue comes up, it will affect only a small part of the codebase and will be easily traceable and fixable.
            </span>
        </div>
        <div class="layers-container">
            <div class="background">
                <div class="layer">
                    <div class="box"></div>
                </div>
                <div class="layer">
                <div class="box body"></div>
                </div>
                <div class="layer">
                    <div class="box nav"></div>
                    <div class="box footer"></div>
                </div>
                <div class="layer">
                    <div class="box dot"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="backend" class="section">
    <div class="container">
        <div class="title">
            <span>Backend</span>
        </div>
        <div class="code-container">
            <div class="editor">
                <div class="header">
                    <div class="control"></div>
                    <div class="control"></div>
                    <div class="control"></div>
                </div>
                <div class="content">
                    <?php for($i=0; $i<24; $i++): ?>
                        <div class="line">
                            <?php for($j=0; $j<rand(0,2); $j++): ?>
                                <div class="ind"></div>
                                <div class="ind"></div>
                                <div class="ind"></div>
                                <div class="ind"></div>
                            <?php endfor; ?>
                            <?php for($j=0; $j<rand(4,20); $j++): ?>
                                <div class="char"></div>
                            <?php endfor; ?>
                        </div>
                    <?php endfor; ?>
                </div>
                <div class="footer">
                    <div class="status"></div>
                </div>
            </div>
            <div class="editor">
                <div class="header">
                    <div class="control"></div>
                    <div class="control"></div>
                    <div class="control"></div>
                </div>
                <div class="content">
                    <?php for($i=0; $i<24; $i++): ?>
                        <div class="line">
                            <?php for($j=0; $j<rand(0,2); $j++): ?>
                                <div class="ind"></div>
                                <div class="ind"></div>
                                <div class="ind"></div>
                                <div class="ind"></div>
                            <?php endfor; ?>
                            <?php for($j=0; $j<rand(8,20); $j++): ?>
                                <div class="char"></div>
                            <?php endfor; ?>
                        </div>
                    <?php endfor; ?>
                </div>
                <div class="footer">
                    <div class="status"></div>
                </div>
            </div>
        </div>
        <div class="description">
            <span>
                Implementing a usable frontend goes wasted without having a powerful backend to support it. I have experience working with modern content management systems such as Wordpress and Grav, and I have also developed a specialized framework in PHP called <a class="link light" target="_blank" href="https://github.com/SHT/Core">Core</a>, which enables me to create a fully working web application (like this one!) in hours.
            </span>
        </div>

    </div>
</div>
