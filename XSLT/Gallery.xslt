<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <div class="bigbox" style="max-width: 100%; height: inherit; 
									border: 2px solid var(--bigBox-border); border-radius: 15px;
									background: linear-gradient(to right, var(--gradient-1), var(--gradient-2));
									box-shadow: 0px 0px 30px 1px var(--bigBox-boxShadow); display: table;
									align-items: flex-start; justify-content: space-around; padding: 5px;">
            <xsl:apply-templates select="imgcontainer/bigbox/imgbox"/>
        </div>
    </xsl:template>

    <!--  imgbox  -->
    <xsl:template match="imgbox">
        <div id="{//*/@id}" style="	box-sizing: content-box; border-radius: 17px; max-width: calc(33.33% - 20px); height: auto;
												display: inline-block; overflow: hidden; position: relative; object-fit: scale-down;
												box-shadow: 0px 0px 3px 1px var(--imgBox-boxShadow);
												margin: 10px; background-size: cover; background-position: center;">
            <xsl:apply-templates select="img"/>
            <xsl:apply-templates select="middle"/>
        </div>
    </xsl:template>

    <xsl:template match="img">
        <!-- img  -->
        <img class="//img/@class" src="{@src}" alt="" style="max-width: 100%; max-height: auto; background-size: auto; aspect-ratio: 16/9;
													opacity: 1; transition: 1ms ease; backface-visibility: hidden; border-radius: 17px;
													transform: scale(1); transition: transform 2s, filter 2s;" />
    </xsl:template>

    <!-- middle  -->
    <xsl:template match="middle">
        <div class="//middle/@class" style="	transition: .5s ease-in-out; opacity: 0.75; position: absolute; top: 50%; left: 50%; 
									text-align: center; transform: translate(-50%, -50%); -ms-transform: translate(-50%, -50%);">
            <div class="//text/@class" style="font-family: 'Roboto', sans-serif; color: #fff;">
				<button style="border: 1px solid yellow; background-color: var(--textBg-color);
								box-shadow: rgba(213, 217, 217, .5) 0 2px 5px 0;
								padding: 10px; width: 100px;">
                    <!-- link -->
					<a href="{//middle/text/a[@id='Buy']/@href}" style="text-decoration: none; color: #000; cursor: pointer;">
                        <xsl:value-of select="'Buy'"/>
                    </a>
				</button>
            </div>
        </div>
    </xsl:template>

</xsl:stylesheet>