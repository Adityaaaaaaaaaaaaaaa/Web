<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html" indent="yes"/>

	<xsl:template match="/about">
		<div class="about-section">
			<h1 style="color: transparent; background-image: var(--h1-gradient-color); 
						-webkit-background-clip: text; background-clip: text; text-align: center; 
						display: block; font-size: 5em; margin-bottom: 20px; margin-top: 5px;
						text-shadow: var(--h1-glow-Effect);"
				><xsl:value-of select="//heading/."/>
			</h1>

			<div class="profile-container" style="display: flex; justify-content: center;" >
				<xsl:apply-templates select="profiles/author"/>
      		</div>
    	</div>
  	</xsl:template>


	<xsl:template match="author">
		<div style="display: block; flex-direction: row; align-items: center;
									max-width: 85%; margin: 10px ; padding: 20px;">

			<div class="{//image/@class}" style="max-width: 300px; max-height: 400px; border-radius: 10%;, box-shadow: var(--userImg-boxShadow);">
				<xsl:copy-of select="image/img"/>
			</div>
			<div class="{//intro/@class}" style="flex-grow: 1; text-align: justify; padding: 30px; line-height: 22px; 
													color: var(--paragraph-color); 
													font-size: 18px; font-family: Cambria;">
				<xsl:copy-of select="intro/node()"/>
			</div>
		</div>
	</xsl:template>
</xsl:stylesheet>