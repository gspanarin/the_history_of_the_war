<?php

use yii\db\Migration;

class m240503_081602_InsertTagDublinCore extends Migration{

    public function safeUp(){
        $this->batchInsert(
                '{{%tag}}', 
                ['id', 'term_name', 'label', 'uri', 'definition', 'comment', 'note', 'default_value', 'created_at', 'updated_at'], 
                [
                    [1, 'title', 'Title', 'http://purl.org/dc/terms/title', 'The name given to the resource. Typically, a Title will be a name by which the resource is formally known.', '<p><em>Label: Title</em></p>\r\n<p><em>Element Description:</em> The name given to the resource. Typically, a Title will be a name by which the resource is formally known.</p>\r\n<p><em>Guidelines for creation of content:</em></p>\r\n<p>If in doubt about what constitutes the title, repeat the Title element and include the variants in second and subsequent Title iterations. If the item is in HTML, view the source document and make sure that the title identified in the title header (if any) is also included as a Title.</p>\r\n<p><em>Examples:</em></p>\r\n<blockquote>\r\n<p>Title="A Pilot\'s Guide to Aircraft Insurance" Title="The Sound of Music" Title="Green on Greens" Title="AOPA\'s Tips on Buying Used Aircraft"</p>\r\n</blockquote>', '', '', 1714318532, 1714318532],
                    [2, 'subject', 'Subject', 'http://purl.org/dc/terms/subject', 'The topic of the content of the resource. Typically, a Subject will be expressed as keywords or key phrases or classification codes that describe the topic of the resource. Recommended best practice is to select a value from a controlled vocabulary or for', '<p><em>Label: Subject and Keywords</em></p>\r\n<p><em>Element Description:</em> The topic of the content of the resource. Typically, a Subject will be expressed as keywords or key phrases or classification codes that describe the topic of the resource. Recommended best practice is to select a value from a controlled vocabulary or formal classification scheme.</p>\r\n<p><em>Guidelines for creation of content:</em></p>\r\n<p>Select subject keywords from the Title or Description information, or from within a text resource. If the subject of the item is a person or an organization, use the same form of the name as you would if the person or organization were a Creator or Contributor.</p>\r\n<p>In general, choose the most significant and unique words for keywords, avoiding those too general to describe a particular item. Subject might include classification data if it is available (for example, Library of Congress Classification Numbers or Dewey Decimal numbers) or controlled vocabularies (such as Medical Subject Headings or Art and Architecture Thesaurus descriptors) as well as keywords.</p>\r\n<p>When including terms from multiple vocabularies, use separate element iterations. If multiple vocabulary terms or keywords are used, either separate terms with semi-colons or use separate iterations of the Subject element.</p>\r\n<p><em>Examples:</em></p>\r\n<blockquote>\r\n<p>Subject="Aircraft leasing and renting" Subject="Dogs" Subject="Olympic skiing" Subject="Street, Picabo"</p>\r\n</blockquote>', '', '', 1714319378, 1714319378],
                    [3, 'description', 'Description', 'http://purl.org/dc/terms/description', 'An account of the content of the resource. Description may include but is not limited to: an abstract, table of contents, reference to a graphical representation of content or a free-text account of the content.', '<p><em>Label: Description</em></p>\r\n<p><em>Element Description:</em> An account of the content of the resource. Description may include but is not limited to: an abstract, table of contents, reference to a graphical representation of content or a free-text account of the content.</p>\r\n<p><em>Guidelines for creation of content:</em></p>\r\n<p>Since the Description field is a potentially rich source of indexable terms, care should be taken to provide this element when possible. Best practice recommendation for this element is to use full sentences, as description is often used to present information to users to assist in their selection of appropriate resources from a set of search results.</p>\r\n<p>Descriptive information can be copied or automatically extracted from the item if there is no abstract or other structured description available. Although the source of the description may be a web page or other structured text with presentation tags, it is generally not good practice to include HTML or other structural tags within the Description element. Applications vary considerably in their ability to interpret such tags, and their inclusion may negatively affect the interoperability of the metadata.</p>\r\n<p><em>Examples:</em></p>\r\n<blockquote>\r\n<p>Description="Illustrated guide to airport markings and lighting signals, with particular reference to SMGCS (Surface Movement Guidance and Control System) for airports with low visibility conditions."</p>\r\n<p>Description="Teachers Domain is a multimedia library for K-12 science educators, developed by WGBH through funding from the National Science Foundation as part of its National Science Digital Library initiative. The site offers a wealth of classroom-ready instructional resources, as well as online professional development materials and a set of tools which allows teachers to manage, annotate, and share the materials they use in classroom teaching."</p>\r\n</blockquote>', '', '', 1714319443, 1714319443],
                    [4, 'type', 'Type', 'http://purl.org/dc/terms/type', 'The nature or genre of the content of the resource. Type includes terms describing general categories, functions, genres, or aggregation levels for content. Recommended best practice is to select a value from a controlled vocabulary (for example, the DCMI', '<p><em>Label: Resource Type</em></p>\r\n<p><em>Element Description:</em> The nature or genre of the content of the resource. Type includes terms describing general categories, functions, genres, or aggregation levels for content. Recommended best practice is to select a value from a controlled vocabulary (for example, the <a href="https://www.dublincore.org/documents/dcmi-type-vocabulary/">DCMIType vocabulary</a> ). To describe the physical or digital manifestation of the resource, use the FORMAT element.</p>\r\n<p><em>Guidelines for content creation:</em></p>\r\n<p>If the resource is composed of multiple mixed types then multiple or repeated Type elements should be used to describe the main components.</p>\r\n<p>Because different communities or domains are expected to use a variety of type vocabularies, best practice to ensure interoperability is to include at least one general type term from the <a href="https://www.dublincore.org/documents/dcmi-type-vocabulary/">DCMIType vocabulary</a> in addition to the domain specific type term(s), in separate Type element iterations.</p>\r\n<p>Examples:</p>\r\n<blockquote>\r\n<p>Type="Image" Type="Sound" Type="Text" Type="simulation"</p>\r\n</blockquote>\r\n<p><strong>Note:</strong> The first three values are taken from the DCMI Type Vocabulary, and follow the capitalization conventions for that vocabulary. The last value is a term from an unspecified source.</p>\r\n<p>The item described is an <em>Electronic art exhibition catalog:</em></p>\r\n<blockquote>\r\n<p>Type="Image" Type="Text" Type="Exhibition catalog"</p>\r\n</blockquote>\r\n<p><strong>Note:</strong> The first two values are taken from the DCMI Type Vocabulary, and follow the capitalization conventions for that vocabulary. The last value is a term from an unspecified source.</p>\r\n<p>The item described is a <em>Multimedia educational program with interactive assignments:</em></p>\r\n<blockquote>\r\n<p>Type="Image" Type="Text" Type="Software" Type="InteractiveResource"</p>\r\n</blockquote>\r\n<p><strong>Note:</strong> All values in this example are taken from the DCMI Type Vocabulary, and follow the capitalization conventions for that vocabulary.</p>', '', '', 1714319514, 1714319514],
                    [5, 'source', 'Source', 'http://purl.org/dc/terms/source', 'A Reference to a resource from which the present resource is derived. The present resource may be derived from the Source resource in whole or part. Recommended best practice is to reference the resource by means of a string or number conforming to a form', '<p><em>Label: Source</em></p>\r\n<p><em>Element Description:</em> A Reference to a resource from which the present resource is derived. The present resource may be derived from the Source resource in whole or part. Recommended best practice is to reference the resource by means of a string or number conforming to a formal identification system.</p>\r\n<p><em>Guidelines for content creation:</em></p>\r\n<p>In general, include in this area information about a resource that is related intellectually to the described resource but does not fit easily into a Relation element.</p>\r\n<p><em>Examples:</em></p>\r\n<blockquote>\r\n<p>Source="RC607.A26W574 1996" [where "RC607.A26W574 1996" is the call number of the print version of the resource, from which the present version was scanned]</p>\r\n<p>Source="Image from page 54 of the 1922 edition of Romeo and Juliet"</p>\r\n</blockquote>', '', '', 1714319557, 1714319557],
                    [6, 'relation', 'Relation', 'http://purl.org/dc/terms/relation', 'A reference to a related resource. Recommended best practice is to reference the resource by means of a string or number conforming to a formal identification system.', '<p><em>Label: Relation</em></p>\r\n<p><em>Element Description:</em> A reference to a related resource. Recommended best practice is to reference the resource by means of a string or number conforming to a formal identification system.</p>\r\n<p><em>Guidelines for content creation:</em></p>\r\n<p>Relationships may be expressed reciprocally (if the resources on both ends of the relationship are being described) or in one direction only, even when there is a refinement available to allow reciprocity. If text strings are used instead of identifying numbers, the reference should be appropriately specific. For instance, a formal bibliographic citation might be used to point users to a particular resource.</p>\r\n<p>Because the refined terms used with Relation provide significantly more information to a user than the unqualified use of Relation, implementers who are describing heavily interrelated resources might choose to use qualified Dublin Core&trade;.</p>\r\n<p><em>Examples:</em></p>\r\n<blockquote>\r\n<p>Title="Reading Turgenev" Relation="Two Lives" [Resource is a collection of two novellas, one of which is "Reading Turgenev"]</p>\r\n</blockquote>\r\n<p>[Relationship described is <strong>IsPartOf</strong>. [Part/Whole relations are those in which one resource is a physical or logical part of another]</p>\r\n<blockquote>\r\n<p>Title="Candle in the Wind" Subject="Diana, Princess of Wales" Date="1997" Creator="John, Elton" Type="sound" Description="Tribute to a dead princess." Relation="Elton John\'s 1976 song Candle in the Wind"</p>\r\n</blockquote>\r\n<p>[Relationship described is <strong>IsVersionOf</strong>.</p>\r\n<p>[Version relations are those in which one resource is an historical state or edition, of another resource by the same creator]</p>\r\n<blockquote>\r\n<p>Title="Electronic AACR2" Relation="Anglo-American Cataloging Rules, 2nd edition"</p>\r\n</blockquote>\r\n<p>[Relationship described is <strong>IsFormatOf</strong>]</p>\r\n<blockquote>\r\n<p>Title="Landsat TM dataset of Arnhemland, NT, Australia" Relation="arnhem.gif"</p>\r\n</blockquote>\r\n<p>[Relationship described is <strong>HasFormat</strong>]</p>\r\n<p>[Format transformation relations are those in which one resource has been derived from another by a reproduction or reformatting technology which is not fundamentally an interpretation but intended to be a representation.]</p>\r\n<blockquote>\r\n<p>Title="Morgan\'s Ancient Society" Relation="Engels\' Origin of the Family, Private Property and the State"</p>\r\n</blockquote>\r\n<p>[Relationship described is <strong>IsReferencedBy</strong>]</p>\r\n<blockquote>\r\n<p>Title="Nymphet Mania" Relation="References Adrian Lyne\'s \'Lolita\'"</p>\r\n</blockquote>\r\n<p>[Relationship described is <strong>References</strong>]</p>\r\n<p>[Reference relations are those in which the author of one resource cites, acknowledges, disputes or otherwise make claims about another resource.]</p>\r\n<blockquote>\r\n<p>Title="Peter Carey\'s novel Oscar and Lucinda" Relation="1998 movie Oscar and Lucinda"</p>\r\n</blockquote>\r\n<p>[Relationship described is <strong>IsBasisFor</strong>]</p>\r\n<blockquote>\r\n<p>Title="The movie My Fair Lady" Relation="Shaw\'s play Pygmalion" [Relationship described is <strong>IsBasedOn</strong>]</p>\r\n</blockquote>\r\n<p>[Creative relations are those in which one resource is a performance, production, derivation, adaptation or interpretation of another resource.]</p>\r\n<blockquote>\r\n<p>Title="Dead Ringer" Relation="Gemstar e-book"</p>\r\n</blockquote>\r\n<p>[Relationship described is <strong>Requires</strong>]</p>\r\n<p>[Dependency relations are those in which one resource requires another resource for its functioning, delivery, or content and cannot be used without the related resource being present.]</p>', '', '', 1714319648, 1714319648],
                    [7, 'coverage', 'Coverage', 'http://purl.org/dc/terms/coverage', 'The extent or scope of the content of the resource. Coverage will typically include spatial location (a place name or geographic co-ordinates), temporal period (a period label, date, or date range) or jurisdiction (such as a named administrative entity). ', '<p><em>Label: Coverage</em></p>\r\n<p><em>Element Description:</em> The extent or scope of the content of the resource. Coverage will typically include spatial location (a place name or geographic co-ordinates), temporal period (a period label, date, or date range) or jurisdiction (such as a named administrative entity). Recommended best practice is to select a value from a controlled vocabulary (for example, the Thesaurus of Geographic Names [Getty Thesaurus of Geographic Names, <a href="http://www.getty.edu/research/tools/vocabulary/tgn/">http://www. getty.edu/research/tools/vocabulary/tgn/</a>]). Where appropriate, named places or time periods should be used in preference to numeric identifiers such as sets of co-ordinates or date ranges.</p>\r\n<p><em>Guidelines for content creation:</em></p>\r\n<p>Whether this element is used for spatial or temporal information, care should be taken to provide consistent information that can be interpreted by human users, particularly in order to provide interoperability in situations where sophisticated geographic or time-specific searching is not supported. For most simple applications, place names or coverage dates might be most useful. For more complex applications, consideration should be given to using an encoding scheme that supports appropriate specification of information, such as <a href="https://www.dublincore.org/documents/dcmi-period/">DCMI Period</a>, <a href="https://www.dublincore.org/documents/dcmi-box/">DCMI Box</a> or <a href="https://www.dublincore.org/documents/dcmi-point/">DCMI Point.</a></p>\r\n<p><em>Examples:</em></p>\r\n<blockquote>\r\n<p>Coverage="1995-1996" Coverage="Boston, MA" Coverage="17th century" Coverage="Upstate New York"</p>\r\n</blockquote>', '', '', 1714319693, 1714319693],
                    [8, 'creator', 'Creator', 'http://purl.org/dc/terms/creator', 'An entity primarily responsible for making the content of the resource. Examples of a Creator include a person, an organization, or a service. Typically the name of the Creator should be used to indicate the entity.', '<p><em>Label: Creator</em></p>\r\n<p>Element Description: An entity primarily responsible for making the content of the resource. Examples of a Creator include a person, an organization, or a service. Typically the name of the Creator should be used to indicate the entity.</p>\r\n<p><em>Guidelines for creation of content:</em></p>\r\n<p>Creators should be listed separately, preferably in the same order that they appear in the publication. Personal names should be listed surname or family name first, followed by forename or given name. When in doubt, give the name as it appears, and do not invert.</p>\r\n<p>In the case of organizations where there is clearly a hierarchy present, list the parts of the hierarchy from largest to smallest, separated by full stops and a space. If it is not clear whether there is a hierarchy present, or unclear which is the larger or smaller portion of the body, give the name as it appears in the item.</p>\r\n<p>If the Creator and Publisher are the same, do not repeat the name in the Publisher area. If the nature of the responsibility is ambiguous, the recommended practice is to use Publisher for organizations, and Creator for individuals. In cases of lesser or ambiguous responsibility, other than creation, use Contributor.</p>\r\n<p><em>Examples:</em></p>\r\n<blockquote>\r\n<p>Creator="Shakespeare, William" Creator="Wen Lee" Creator="Hubble Telescope" Creator="Internal Revenue Service. Customer Complaints Unit"</p>\r\n</blockquote>', '', '', 1714319736, 1714319736],
                    [9, 'publisher', 'Publisher', 'http://purl.org/dc/terms/publisher', 'The entity responsible for making the resource available. Examples of a Publisher include a person, an organization, or a service. Typically, the name of a Publisher should be used to indicate the entity.', '<p><em>Label: Publisher</em></p>\r\n<p><em>Element Description:</em> The entity responsible for making the resource available. Examples of a Publisher include a person, an organization, or a service. Typically, the name of a Publisher should be used to indicate the entity.</p>\r\n<p><em>Guidelines for content creation:</em></p>\r\n<p>The intent of specifying this field is to identify the entity that provides access to the resource. If the Creator and Publisher are the same, do not repeat the name in the Publisher area. If the nature of the responsibility is ambiguous, the recommended practice is to use Publisher for organizations, and Creator for individuals. In cases of ambiguous responsibility, use Contributor.</p>\r\n<p>Examples:</p>\r\n<blockquote>\r\n<p>Publisher="University of South Where" Publisher="Funky Websites, Inc." Publisher="Carmen Miranda"</p>\r\n</blockquote>', '', '', 1714319775, 1714319775],
                    [10, 'contributor', 'Contributor', 'http://purl.org/dc/terms/contributor', 'An entity responsible for making contributions to the content of the resource. Examples of a Contributor include a person, an organization or a service. Typically, the name of a Contributor should be used to indicate the entity.', '<p><em>Label: Contributor</em></p>\r\n<p><em>Element Description:</em> An entity responsible for making contributions to the content of the resource. Examples of a Contributor include a person, an organization or a service. Typically, the name of a Contributor should be used to indicate the entity.</p>\r\n<p><em>Guideline for content creation:</em></p>\r\n<p>The same general guidelines for using names of persons or organizations as Creators apply here. Contributor is the most general of the elements used for "agents" responsible for the resource, so should be used when primary responsibility is unknown or irrelevant.</p>', '', '', 1714319832, 1714319832],
                    [11, 'rights', 'Rights', 'http://purl.org/dc/terms/rights', 'Information about rights held in and over the resource. Typically a Rights element will contain a rights management statement for the resource, or reference a service providing such information. Rights information often encompasses Intellectual Property R', '<p><em>Label: Rights Management</em></p>\r\n<p><em>Element Description:</em> Information about rights held in and over the resource. Typically a Rights element will contain a rights management statement for the resource, or reference a service providing such information. Rights information often encompasses Intellectual Property Rights (IPR), Copyright, and various Property Rights. If the rights element is absent, no assumptions can be made about the status of these and other rights with respect to the resource.</p>\r\n<p><em>Guidelines for content creation:</em></p>\r\n<p>The Rights element may be used for either a textual statement or a URL pointing to a rights statement, or a combination, when a brief statement and a more lengthy one are available.</p>\r\n<p>Examples:</p>\r\n<blockquote>\r\n<p>Rights="Access limited to members" Rights="http://cs-tr.cs.cornell.edu/Dienst/Repository/2.0/Terms&amp; quot;</p>\r\n</blockquote>', '', '', 1714319875, 1714319875],
                    [12, 'date', 'Date', 'http://purl.org/dc/terms/date', 'A date associated with an event in the life cycle of the resource. Typically, Date will be associated with the creation or availability of the resource. Recommended best practice for encoding the date value is defined in a profile of ISO 8601 [Date and Ti', '<p><em>Label: Date</em></p>\r\n<p><em>Element Description:</em> A date associated with an event in the life cycle of the resource. Typically, Date will be associated with the creation or availability of the resource. Recommended best practice for encoding the date value is defined in a profile of ISO 8601 [Date and Time Formats, W3C Note, <a href="http://www.w3.org/TR/NOTE-datetime">http://www.w3.org/TR/NOTE- datetime</a>] and follows the YYYY-MM-DD format.</p>\r\n<p>Guidelines for content creation:</p>\r\n<p>If the full date is unknown, month and year (YYYY-MM) or just year (YYYY) may be used. Many other schemes are possible, but if used, they may not be easily interpreted by users or software.</p>\r\n<p>Examples:</p>\r\n<blockquote>\r\n<p>Date="1998-02-16" Date="1998-02" Date="1998"</p>\r\n</blockquote>', '', '', 1714319920, 1714319920],
                    [13, 'format', 'Format', 'http://purl.org/dc/terms/format', 'The physical or digital manifestation of the resource. Typically, Format may include the media-type or dimensions of the resource. Examples of dimensions include size and duration. Format may be used to determine the software, hardware or other equipment ', '<p><em>Label: Format</em></p>\r\n<p><em>Element Description:</em> The physical or digital manifestation of the resource. Typically, Format may include the media-type or dimensions of the resource. Examples of dimensions include size and duration. Format may be used to determine the software, hardware or other equipment needed to display or operate the resource.</p>\r\n<p>Recommended best practice is to select a value from a controlled vocabulary (for example, the list of Internet Media Types [<a href="http://www.iana.org/assignments/media-types/">http://www.iana.org/ assignments/media-types/</a>] defining computer media formats).</p>\r\n<p><em>Guidelines for content creation:</em></p>\r\n<p>In addition to the specific physical or electronic media format, information concerning the size of a resource may be included in the content of the Format element if available. In resource discovery size, extent or medium of the resource might be used as a criterion to select resources of interest, since a user may need to evaluate whether they can make use of the resource within the infrastructure available to them.</p>\r\n<p>When more than one category of format information is included in a single record, they should go in separate iterations of the element.</p>\r\n<p><em>Examples:</em></p>\r\n<blockquote>\r\n<p>Title="Dublin Core&trade; icon" Identifier="http://purl.org/metadata/dublin_core/images/dc2.gif&amp; quot; Type="Image" Format="image/gif" Format="4 kB"&gt; Subject="Saturn" Type="Image" Format="image/gif 6" Format="40 x 512 pixels" Identifier="http://www.not.iac.es/newwww/photos/images/satnot.gif "&gt; Title="The Bronco Buster" Creator="Frederic Remington" Type="Physical object" Format="bronze" Format="22 in."</p>\r\n</blockquote>', '', '', 1714319978, 1714319978],
                    [14, 'identifier', 'Identifier', 'http://purl.org/dc/terms/identifier', 'An unambiguous reference to the resource within a given context. Recommended best practice is to identify the resource by means of a string or number conforming to a formal identification system. Examples of formal identification systems include the Unifo', '<p><em>Label: Resource Identifier</em></p>\r\n<p><em>Element Description:</em> An unambiguous reference to the resource within a given context. Recommended best practice is to identify the resource by means of a string or number conforming to a formal identification system. Examples of formal identification systems include the Uniform Resource Identifier (URI) (including the Uniform Resource Locator (URL), the Digital Object Identifier (DOI) and the International Standard Book Number (ISBN).</p>\r\n<p><em>Guidelines for content creation:</em></p>\r\n<p>This element can also be used for local identifiers (e.g. ID numbers or call numbers) assigned by the Creator of the resource to apply to a particular item. It should not be used for identification of the metadata record itself.</p>\r\n<p><em>Examples:</em></p>\r\n<blockquote>\r\n<p>Identifier="http://purl.oclc.org/metadata/dublin_core/&amp; quot; Identifier="ISBN:0385424728" Identifier="H-A-X 5690B" [publisher number]</p>\r\n</blockquote>', '', '', 1714320018, 1714320018],
                    [15, 'language', 'Language', 'http://purl.org/dc/terms/language', 'A language of the intellectual content of the resource. Recommended best practice for the values of the Language element is defined by RFC 3066 [RFC 3066, http://www.ietf.org/rfc/ rfc3066.txt] which, in conjunction with ISO 639 [ISO 639, http://www.oasis-', '<p><em>Label: Language</em></p>\r\n<p><em>Element Description:</em> A language of the intellectual content of the resource. Recommended best practice for the values of the Language element is defined by RFC 3066 [RFC 3066, <a href="http://www.ietf.org/rfc/rfc3066.txt">http://www.ietf.org/rfc/ rfc3066.txt</a>] which, in conjunction with ISO 639 [ISO 639, <a href="http://www.oasis-open.org/cover/iso639a.html">http://www.oasis- open.org/cover/iso639a.html</a>]), defines two- and three-letter primary language tags with optional subtags. Examples include "en" or "eng" for English, "akk" for Akkadian, and "en-GB" for English used in the United Kingdom.</p>\r\n<p><em>Guidelines for content creation:</em></p>\r\n<p>Either a coded value or text string can be represented here. If the content is in more than one language, the element may be repeated.</p>\r\n<p>Examples:</p>\r\n<blockquote>\r\n<p>Language="en" Language="fr" Language="Primarily English, with some abstracts also in French." Language="en-US"</p>\r\n</blockquote>\r\n<p><strong>NOTE:</strong> Audience, Provenance and RightsHolder are elements, but not part of the Simple Dublin Core&trade; fifteen elements. Use Audience, Provenance and RightsHolder only when using Qualified Dublin Core&trade;.</p>', '', '', 1714320058, 1714320058],
                    [16, 'audience', 'Audience', 'http://purl.org/dc/terms/audience', 'A class of entity for whom the resource is intended or useful. A class of entity may be determined by the creator or the publisher or by a third party.', '<p><em>Label: Audience</em></p>\r\n<p><em>Element Description:</em> A class of entity for whom the resource is intended or useful. A class of entity may be determined by the creator or the publisher or by a third party.</p>\r\n<p><em>Guidelines for content creation:</em></p>\r\n<p>Audience terms are best utilized in the context of formal or informal controlled vocabularies. None are presently recommended or registered by DCMI, but several communities of interest are engaged in setting up audience vocabularies. In the absence of recommended controlled vocabularies, implementors are encouraged to develop local lists of values, and to use them consistently.</p>\r\n<p><em>Examples:</em></p>\r\n<blockquote>\r\n<p>Audience="elementary school students" Audience="ESL teachers" Audience="deaf adults"</p>\r\n</blockquote>', '', '', 1714320106, 1714320106],
                    [17, 'provenance', 'Provenance', 'http://purl.org/dc/terms/provenance', 'A statement of any changes in ownership and custody of the resource since its creation that are significant for its authenticity, integrity and interpretation. The statement may include a description of any changes successive custodians made to the resour', '<p><em>Label: Provenance</em></p>\r\n<p><em>Element Description:</em> A statement of any changes in ownership and custody of the resource since its creation that are significant for its authenticity, integrity and interpretation. The statement may include a description of any changes successive custodians made to the resource.</p>\r\n<p><em>Guidelines for content creation:</em></p>\r\n<p><em>Examples:</em></p>\r\n<blockquote>\r\n<p>Provenance="This copy once owned by Benjamin Spock." Provenance="Estate of Hunter Thompson." Provenance="Stolen in 1999; recovered by the Museum in 2003."</p>\r\n</blockquote>', '', '', 1714320158, 1714320158],
                    [18, 'rightsHolder', 'RightsHolder', 'http://purl.org/dc/terms/rightsHolder', 'A person or organization owning or managing rights over the resource. Recommended best practice is to use the URI or name of the Rights Holder to indicate the entity.', '<p><em>Label: Rights Holder</em></p>\r\n<p><em>Element Description:</em> A person or organization owning or managing rights over the resource. Recommended best practice is to use the URI or name of the Rights Holder to indicate the entity.</p>\r\n<p><em>Guidelines for content creation:</em></p>\r\n<p>Since, for the most part, people and organizations are not typically assigned URIs, a person or organization holding rights over a resource would be named using a text string. People and organizations sometimes have websites, but URLs for these are not generally appropriate for use in this context, since they are not clearly identifying the person or organization, but rather the location of a website about them.</p>\r\n<p><em>Examples:</em></p>\r\n<blockquote>\r\n<p>RightsHolder="Stuart Weibel" RightsHolder="University of Bath"</p>\r\n</blockquote>', '', '', 1714320198, 1714320198],
                    [19, 'instructionalMethod', 'InstructionalMethod', 'http://purl.org/dc/terms/instructionalMethod', 'A process, used to engender knowledge, attitudes and skills, that the resource is designed to support. Instructional Method will typically include ways of presenting instructional materials or conducting instructional activities, patterns of learner-to-le', '<p><em>Label: Instructional Method</em></p>\r\n<p><em>Element Description:</em> A process, used to engender knowledge, attitudes and skills, that the resource is designed to support. Instructional Method will typically include ways of presenting instructional materials or conducting instructional activities, patterns of learner-to-learner and learner-to-instructor interactions, and mechanisms by which group and individual levels of learning are measured. Instructional methods include all aspects of the instruction and learning processes from planning and implementation through evaluation and feedback.</p>\r\n<p><em>Guidelines for content creation:</em></p>\r\n<p>Best practice is to use terms from controlled vocabularies, whether developed for the use of a particular project or in general use in an educational context.</p>\r\n<p><em>Examples:</em></p>\r\n<blockquote>\r\n<p>InstructionalMethod="Experiential learning" InstructionalMethod="Observation" InstructionalMethod="Large Group instruction"</p>\r\n</blockquote>', '', '', 1714320237, 1714320237],

                ]
                );
    }


    public function safeDown(){
        $this->delete('{{%tag}}');

        return true;
    }

   
}