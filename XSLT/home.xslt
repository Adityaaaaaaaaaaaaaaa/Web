<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0" >
    <xsl:template match="/content">
        <div class="fade-in" style="display: inline-block;">
            <xsl:apply-templates select="//logo"/>
            <xsl:apply-templates select="//intro"/>
        </div>
    </xsl:template>

    <xsl:template match="logo">
        <div class="{@class}" style="width: fit-content; text-align: center; margin: 0 auto; transition: transform 0.5s ease;">
            <xsl:apply-templates select="img"/>
        </div>
    </xsl:template>

    <xsl:template match="img">
        <img src="{//@src}" id="{//@id}" style="height: auto; width: 400px; object-fit: cover;" />
    </xsl:template>

    <xsl:template match="intro">
        <div class="{@class}" style="padding: 5px; backdrop-filter: blur(1px); text-align: center; align-items:center; flex: 1; 
                                    font-family: 'Neon Tubes', cursive; columns: 1; column-gap:20px; max-width: fit-content;
                                    width: 100%; margin: 2% 10% auto;">
            <p class="{//paragraph/@class}" style="font-size: 20px; color: var(--maintext-color); cursor: pointer;
                                                    text-shadow: 0 0 20px var(--maintext-color); line-height: 1.35;">
                <xsl:value-of select="."/>
            </p>
        </div>
    </xsl:template>
</xsl:stylesheet>