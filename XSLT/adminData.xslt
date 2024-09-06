<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" indent="yes"/>

    <xsl:template match="/">
        <html>
            <head>
                <title>Admin Table Data</title>
                <link rel="stylesheet" type="text/css" href="../CSS/home.css"/>
                <link rel="stylesheet" type="text/css" href="../CSS/adminData.css" />
                <!--Script for the back button-->
				<script>
					function goBack() {
						window.history.back();
					}
				</script>
            </head>
            <body onload="highlightRows()">
                <!-- Table heading -->
                <div id="tableHeading">
                    <h1>
                        <xsl:value-of select="name(/*/*[1])"/>
                    </h1>
                </div>
                <div id="table">
                    <table border="1" id="tableMain">
                        <!-- Get table headings based on the first row of data -->
                        <tr class="row">
                            <xsl:for-each select="/*/*[1]/*">
                                <th class="tableHeader">
                                    <xsl:value-of select="name()"/>
                                </th>
                            </xsl:for-each>
                        </tr>
                        <!-- Iterate through each row of data, ref Java loop sem 2 last year -->
                        <xsl:for-each select="/*/*">
                            <tr class="row">
                                <!-- Iterate through each cell of data in the current row -->
                                <xsl:for-each select="*">
                                    <td class="columnCell">
                                        <xsl:value-of select="."/>
                                    </td>
                                </xsl:for-each>
                            </tr>
                        </xsl:for-each>
                    </table>
                </div>
                <br/><br/>
                <div id="btnDiv">
                    <button onclick="goBack()" class="bckBtn">Back</button>
                </div>
                <br/><br/>
                <!-- Additional data area -->
                <div id="addDataDiv">
                    <h2 id="AddData">Additional Data</h2>
                    <xsl:call-template name="additionalData">
                        <xsl:with-param name="table" select="name(/*/*[1])"/>
                    </xsl:call-template>
                </div>

                <!-- mouse trail -->
                <script src="../Js/mouse.js"></script>

                <!-- dark mode js -->
                <script src="../Js/dark-mode.js"></script>

            </body>
        </html>
    </xsl:template>




    <!-- Template for displaying additional data -->
    <xsl:template name="additionalData">
        <xsl:param name="table"/>

        <!-- Call the appropriate template based on the table parameter -->
        <xsl:choose>
            <xsl:when test="$table = 'client'">
                <xsl:call-template name="clientStats"/>
            </xsl:when>
            <xsl:when test="$table = 'reservation'">
                <xsl:call-template name="reservationStats"/>
            </xsl:when>
            <xsl:when test="$table = 'inquiry'">
                <xsl:call-template name="inquiryStats"/>
            </xsl:when>
            <xsl:when test="$table = 'feedback'">
                <xsl:call-template name="feedbackStats"/>
            </xsl:when>
            <xsl:when test="$table = 'uploaded_files'">
                <xsl:call-template name="fileStats"/>
            </xsl:when>
            <xsl:otherwise>
                <p class="totalStat">No additional data available for this table.</p>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>




    <!-- Template for client statistics -->
    <xsl:template name="clientStats">
        <!-- Total count of clients -->
        <div class="totalStat">
            <p>Total number of clients: <xsl:value-of select="count(/*/client)"/></p>
        </div>
    </xsl:template>




    <!-- Template for reservation statistics -->
    <xsl:template name="reservationStats">
        <!-- Calculate total number of reservations -->
        <xsl:variable name="totalReservations" select="count(//reservation)"/>
        <div class="totalStat">
            <p>Total number of reservations: <xsl:value-of select="$totalReservations"/></p>
        </div>
        
        <!-- Calculate the most common email -->
        <xsl:variable name="mostCommonEmail">
            <xsl:for-each select="//reservation">
                <xsl:sort select="count(//reservation[cEmail = current()/cEmail])" data-type="number" order="descending"/>
                <xsl:if test="position() = 1">
                    <xsl:value-of select="cEmail"/>
                </xsl:if>
            </xsl:for-each>
        </xsl:variable>
        
        <!-- Display details of the user with the most reservations -->
        <xsl:if test="$mostCommonEmail">
            <diV class="comEmail">
                <p class="para">Details of the user with the most reservations:</p>
                <ul class="liUl">
                    <li>Name: <xsl:value-of select="//reservation[cEmail = $mostCommonEmail]/cName"/></li>
                    <li>Surname: <xsl:value-of select="//reservation[cEmail = $mostCommonEmail]/cSurname"/></li>
                    <li>Email: <xsl:value-of select="$mostCommonEmail"/></li>
                    <li>Total Reservations: <xsl:value-of select="count(//reservation[cEmail = $mostCommonEmail])"/></li>
                </ul>
            </diV>
        </xsl:if>
    </xsl:template>




    <!-- Template for inquiry statistics -->
    <xsl:template name="inquiryStats">
        <!-- Calculate total number of inquiries -->
        <xsl:variable name="totalInquiries" select="count(//inquiry)"/>
        <div class="totalStat">
            <p>Total number of inquiries: <xsl:value-of select="$totalInquiries"/></p>
        </div>
        
        
        <!-- Find the most common email -->
        <xsl:variable name="mostCommonEmail">
            <xsl:for-each select="//inquiry">
                <xsl:sort select="count(//inquiry[cEmail = current()/cEmail])" data-type="number" order="descending"/>
                <xsl:if test="position() = 1">
                    <xsl:value-of select="cEmail"/>
                </xsl:if>
            </xsl:for-each>
        </xsl:variable>
        
        <!-- Display details of the user with the most inquiries -->
        <xsl:if test="$mostCommonEmail">
            <div class="comEmail">
                <p class="para">Details of the user with the most inquiries:</p>
                <ul class="liUl">
                    <li>Name: <xsl:value-of select="//inquiry[cEmail = $mostCommonEmail]/cName"/></li>
                    <li>Email: <xsl:value-of select="$mostCommonEmail"/></li>
                    <li>Total Inquiries: <xsl:value-of select="count(//inquiry[cEmail = $mostCommonEmail])"/></li>
                </ul>
            </div>
        </xsl:if>
        
        <!-- Display messages containing "Price" or "Buy" -->
        <div class="message">
            <p>Messages containing "Price" or "Buy":</p>
            <ul>
                <xsl:for-each select="//inquiry[contains(translate(cMessage, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'price') or contains(translate(cMessage, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'buy')]">
                    <li><xsl:value-of select="cMessage"/></li>
                </xsl:for-each>
            </ul>
        </div>
    </xsl:template>




    <!-- Template for feedback statistics -->
    <xsl:template name="feedbackStats">
        <!-- Calculate total number of feedback -->
        <xsl:variable name="totalFeedback" select="count(//feedback)"/>
        <div class="totalStat">
            <p>Total number of feedback: <xsl:value-of select="$totalFeedback"/></p>
        </div>
        
        
        <!-- Calculate most feedback by user -->
        <xsl:variable name="mostFeedbackUser">
            <xsl:for-each select="//feedback">
                <xsl:sort select="count(//feedback[cName = current()/cName])" data-type="number" order="descending"/>
                <xsl:if test="position() = 1">
                    <xsl:value-of select="cName"/>
                </xsl:if>
            </xsl:for-each>
        </xsl:variable>
        
        <!-- Display user with most feedback and their count -->
        <xsl:if test="$mostFeedbackUser">
            <div class="comFb">
                <p>User with the most feedback: <xsl:value-of select="$mostFeedbackUser"/></p>
                <p>Total feedback given by this user: <xsl:value-of select="count(//feedback[cName = $mostFeedbackUser])"/></p>
            </div>
        </xsl:if>
        
        <!-- Calculate gender distribution -->
        <xsl:variable name="totalFemale" select="count(//feedback[cgender = 'F'])"/>
        <xsl:variable name="totalMale" select="count(//feedback[cgender = 'M'])"/>
        <xsl:variable name="totalPreferNotToSay" select="count(//feedback[cgender = 'X'])"/>
        <div id="Gdata">
            <p>Gender distribution:</p>
            <ul>
                <li>Female: <xsl:value-of select="format-number($totalFemale div $totalFeedback * 100, '0.00')"/>%</li>
                <li>Male: <xsl:value-of select="format-number($totalMale div $totalFeedback * 100, '0.00')"/>%</li>
                <li>Prefer not to say: <xsl:value-of select="format-number($totalPreferNotToSay div $totalFeedback * 100, '0.00')"/>%</li>
            </ul>
        </div>
        
        <!-- Calculate recommendation distribution -->
        <xsl:variable name="recommendYes" select="count(//feedback[cRecommend = 'Yes'])"/>
        <xsl:variable name="recommendNo" select="count(//feedback[cRecommend = 'No'])"/>
        <xsl:variable name="recommendMaybe" select="count(//feedback[cRecommend = 'Maybe'])"/>
        <div id="Rdata">
            <p>Recommendation distribution:</p>
            <ul>
                <li>Yes: <xsl:value-of select="format-number($recommendYes div $totalFeedback * 100, '0.00')"/>%</li>
                <li>No: <xsl:value-of select="format-number($recommendNo div $totalFeedback * 100, '0.00')"/>%</li>
                <li>Maybe: <xsl:value-of select="format-number($recommendMaybe div $totalFeedback * 100, '0.00')"/>%</li>
            </ul>
        </div>
        
        <!-- Display messages containing specific words -->
        <div class="message">
            <p>Messages containing specific words 'love' or 'good':</p>
            <ul>
                <xsl:for-each select="//feedback[contains(translate(cSuggestion, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'love') or contains(translate(cSuggestion, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'good')]">
                    <li><xsl:value-of select="cSuggestion"/></li>
                </xsl:for-each>
            </ul>
        </div>
    </xsl:template>




    <!-- Template for file statistics -->
    <xsl:template name="fileStats">
        <!-- Calculate total number of files -->
        <xsl:variable name="totalFiles" select="count(//uploaded_files)"/>
        <div class="totalStat">
            <p>Total number of files: <xsl:value-of select="$totalFiles"/></p>
        </div>
        
        
        <!-- Calculate all available file types and their percentage -->
        <div id="filePercentage">
            <p>File types and their statistics:</p>
            <ul>
                <xsl:for-each select="//uploaded_files">
                    <xsl:variable name="currentFileType" select="filetype"/>
                    <xsl:if test="not(preceding-sibling::uploaded_files[filetype = $currentFileType])">
                        <xsl:variable name="fileCount" select="count(//uploaded_files[filetype = $currentFileType])"/>
                        <xsl:variable name="cumulativeSize" select="sum(//uploaded_files[filetype = $currentFileType]/filesize)"/>            
                        <li>
                            <xsl:value-of select="$currentFileType"/>
                            <xsl:text>: </xsl:text>
                            <!-- Calculate percentage -->
                            <xsl:value-of select="format-number($fileCount div $totalFiles * 100, '0.00')"/>%<br/>
                            <xsl:text>Count: </xsl:text><xsl:value-of select="$fileCount"/><br/>
                            <xsl:text>Cumulative size: </xsl:text><xsl:value-of select="format-number($cumulativeSize div (1024 * 1024), '0.00')"/> MB            
                        </li>
                    </xsl:if>
                </xsl:for-each>
            </ul>
        </div>

        
        <!-- Calculate average file size -->
        <xsl:variable name="totalFileSize" select="sum(//uploaded_files/filesize)"/>
        <xsl:variable name="averageFileSize" select="$totalFileSize div $totalFiles"/>
        <div class="fileInfo">
            <p>Average file size: <xsl:value-of select="format-number($averageFileSize div (1024 * 1024), '0.00')"/> MB</p>
        </div>
        
        
        <!-- Find top 3 largest file sizes -->
        <div id="fileBox">
            <p id="fileSizeHeading" >Top 3 largest file sizes:</p>
            <xsl:for-each select="//uploaded_files">
                <xsl:sort select="filesize" data-type="number" order="descending"/>
                <xsl:if test="position() &lt;= 3">
                    <p class="filesize">
                        <xsl:value-of select="filename"/>
                        <xsl:text>: </xsl:text>
                        <xsl:value-of select="format-number(filesize div (1024 * 1024), '0.00')"/> MB
                    </p>
                </xsl:if>
            </xsl:for-each>
        </div>
        
        <!-- Calculate total size in megabytes -->
        <div class="fileInfo">
            <p>Total size: <xsl:value-of select="format-number($totalFileSize div (1024 * 1024), '0.00')"/> MB</p>
        </div>
        
    </xsl:template>

</xsl:stylesheet>
