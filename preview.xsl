<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:output method="html" encoding="utf-8"/>

<!-- ======================================================================= -->
<xsl:template match="channel">
<!-- ======================================================================= -->
<html>
<head>
  <title><xsl:value-of select="title"/></title>
  <meta name="MSSmartTagsPreventParsing" content="TRUE" />
  <meta http-equiv="imagetoolbar" content="no" />
  <link rel="stylesheet" type="text/css" href="style.css" />
  <script>
    function doLoad() {
      if (navigator.userAgent.toLowerCase().indexOf("msie") > -1) return;
	  for (var i = 1; i &lt;= <xsl:value-of select="count(item)" />; i++) {
        unescapeHTML('item_' + i);
	  }
    }
    function unescapeHTML(id) {
      var lt = new RegExp("&amp;lt;", "g");
      var gt = new RegExp("&amp;gt;", "g");
      var amp = new RegExp("&amp;amp;", "g");
	  var obj = document.getElementById(id);
	  var s = obj.innerHTML;
      obj.innerHTML = s.replace(lt, "&lt;").replace(gt, "&gt;").replace(amp, "&amp;");
    }
  </script>
</head>
<body onload="doLoad()">
<div class="body feed-preview">

<div class="main">
  <h1><xsl:value-of select="title"/></h1>
  <xsl:if test="description">
    <p><xsl:value-of select="description"/></p>
  </xsl:if>
  <xsl:if test="link">
    <p>Link: <a href="{link}"><xsl:value-of select="link"/></a></p>
  </xsl:if>
  <p class="date-preview" style="margin-bottom:0px;">Last updated: <xsl:value-of select="lastBuildDate"/></p>
</div>

<div class="main">
  <xsl:apply-templates select="item"/>
</div>

</div>
</body>
</html>
</xsl:template>

<!-- ======================================================================= -->
<xsl:template match="item">
<!-- ======================================================================= -->
  <h2><span class="bullet">&#187;&#160;</span><xsl:value-of select="title"/></h2>
  <xsl:if test="link">
    <p>Link: <a href="{link}"><xsl:value-of select="link"/></a></p>
  </xsl:if>
  <div class="p" id="item_{position()}">
    <xsl:value-of select="description" disable-output-escaping="yes"/>
  </div>
</xsl:template>

</xsl:stylesheet>