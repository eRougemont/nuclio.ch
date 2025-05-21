<?xml version="1.0" encoding="UTF-8"?>
<xsl:transform version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
  xmlns="http://www.tei-c.org/ns/1.0"
  xmlns:tei="http://www.tei-c.org/ns/1.0"
  exclude-result-prefixes="tei"
  >
    <xsl:template match="/">
        <xsl:for-each select="//tei:bibl">
            <xsl:text>

</xsl:text>
            <xsl:copy-of select="."/>
        </xsl:for-each>
    </xsl:template>
</xsl:transform>