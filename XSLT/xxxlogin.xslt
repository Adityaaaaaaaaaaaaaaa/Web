<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" encoding="UTF-8"/>

    <!--  root  -->
    <xsl:template match="/loginform">
        <div class="{@class}">
            <xsl:apply-templates/>
        </div>
    </xsl:template>

    <!--  mainForm-box  -->
    <xsl:template match="mainForm-box">
        <div class="{@class}" id="{@id}">
            <xsl:apply-templates/>
        </div>
    </xsl:template>

    <!--  switchbut  -->
    <xsl:template match="switchbut">
        <button type="{@type}" class="{@class}" onclick="{@onclick}">
            <xsl:apply-templates/>
        </button>
    </xsl:template>

    <!--  form  -->
    <xsl:template match="form">
        <form id="{@id}" name="{@name}" class="{@class}" method="{@method}" action="{@action}" onsubmit="{@onsubmit}">
            <xsl:apply-templates/>
        </form>
    </xsl:template>

    <!--  h1  -->
    <xsl:template match="h1">
        <h1><xsl:apply-templates/></h1>
    </xsl:template>

    <!--  input elements -->
    <xsl:template match="input">
        <input type="{@type}" class="{@class}" name="{@name}" placeholder="{@placeholder}" onblur="{@onblur}" required="{@required}"/>
    </xsl:template>

    <!--  div  -->
    <xsl:template match="div">
        <div class="{@class}" id="{@id}">
            <xsl:apply-templates/>
        </div>
    </xsl:template>

    <!--  button  -->
    <xsl:template match="button">
        <button type="{@type}" class="{@class}" onclick="{@onclick}">
            <xsl:apply-templates/>
        </button>
    </xsl:template>

    <!-- Match all other elements and copy them -->
    <xsl:template match="*">
        <xsl:copy>
            <xsl:apply-templates select="@* | node()"/>
        </xsl:copy>
    </xsl:template>

    <!--  attributes -->
    <xsl:template match="@*">
        <xsl:copy/>
    </xsl:template>
</xsl:stylesheet>
