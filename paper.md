#基于云计算的在线教育资源共享平台的设计与研究

##摘要

在资源共享和信息传播日渐便利的网络时代，高等教育模式也在发生着史无前例的变革。自美国斯坦福大学在2011年推出“大规模开放在线课程”(简称MOOCs)以来，全球越来越多的高校加入到了提供网络公开课资源的行列中，为各国寻求高等教育的学子打破地域和时间的限制，打开了成本更低、机会更广的学习之门。专家称，这种教育模式将会影响全球数亿人的命运。然而，如何合理换算网上大学的学分、学历认证等问题也给各国教育机构提出了新的挑战。

随着计算机技术和网络技术的发展,大部分学校都在利用网络资源来实现教学资源的共享。传统网络模式进行教学资源共享的方式很容易造成“信息孤岛”,使得“孤岛”之间联系不畅通,难以实现用户的需求。本文提出基于云计算的教学资源共享体系的研究方案,该方案的设计结合了云计算技术,Web开发技术,充分利用云计算的特点,达到了消除“信息孤岛”的目的。
本系统采用Sina App Engine云平台,使用Yii框架快速开发基于php的网站。充分利用了Sina App Engine的特点及长处,最终实现了教学资源共享体系的设计与研究。
本文首先介绍了云计算的概念和云体系结构模型,通过对现有云平台的简单介绍,了解各个公司平台的特点和功能；其次详细介绍了Sina App Engine平台搭建的底层技术,分析了Sina App Engine开发相关API；然后详细阐述了教学资源共享体系的设计方案。包括竞品分析、需求分析、概要设计及详细设计。并针对在Sina App Engine环境下无法完美使用Yii框架、及数据存储的难点问题给出了解决方案。最后通过对Sina App Engine编程环境的研究结合给出的设计方案实现了教学资源共享系统,其中包括业务逻辑实现,界面实现和数据持久化实现。最后,对论文做出了总结,指出在研究过程中存在的不足,并就当前的问题提出了自己的建议,提出了下一步工作的计划。

##abstract
Resource sharing and dissemination of information to facilitate the growing of the Internet age, higher education model is also undergoing unprecedented change. From Stanford University in the United States launched a "massive open online course" (referred MOOCs) in 2011, the global more and more colleges and universities joined the ranks of providing network resources in the open class for countries to seek higher education students to break the geographical and time restrictions and opened the lower cost, the opportunity to learn the door wider. Experts said that this mode of education will affect the fate of hundreds of millions of people worldwide. However, in terms of how reasonable online college credits, recognition of qualifications and other issues to national educational institutions presented new challenges.

With the development of computer technology and network technology, the majority of schools are using network resources to achieve sharing of teaching resources. The traditional network model of teaching sharing of resources is likely to cause "islands of information", making the link between the "island" is not clear, it is difficult to achieve the needs of users. In this paper, based on cloud computing research program teaching resource sharing system, the design of the program combines cloud computing technology, Web development technology, take full advantage of the characteristics of cloud computing, to eliminate "islands of information" purposes.
The system uses Sina App Engine cloud platform, use Yii framework for rapid development based on php site. Sina App Engine takes full advantage of the characteristics and strengths, and ultimately design Teaching Resource Sharing System.
This paper introduces the concept and structure of the cloud computing model cloud system, through the existing cloud platforms brief to understand the features and functions of each company platform; secondly Details of the Sina App Engine platform to build the underlying technology, analyzes the Sina App Engine development-related API; then elaborated on the design of teaching resources sharing system. Including analysis of competing products, requirements analysis, design and detailed design. And for the use Yii framework can not be perfect in the Sina App Engine environment, and data storage solutions for difficult problems presented. Finally, through the Sina App Engine programming environment study design is given in combination to achieve a teaching resource sharing systems, including business logic implementation, interface implementation, and data persistence implementation. Finally, the paper made a summary, the study points out the shortcomings existing in the process, and put forward its own proposals on the current problem, a plan for future work.

##绪论

##相关理论介绍
###云计算
####云计算概念
云计算（cloudcomputing）是基于互联网的相关服务的增加、使用和交付模式，通常涉及通过互联网来提供动态易扩展且经常是虚拟化的资源。
(原文：Cloud computing is a style of computing in which dynamically scalable and often virtualized resources are provided as a service over the Internet.)
美国国家标准与技术研究院（NIST）定义：云计算是一种按使用量付费的模式，这种模式提供可用的、便捷的、按需的网络访问， 进入可配置的计算资源共享池（资源包括网络，服务器，存储，应用软件，服务），这些资源能够被快速提供，只需投入很少的管理工作，或与服务供应商进行很少的交互。XenSystem，以及在国外已经非常成熟的Intel 和IBM，各种“云计算”的应用服务范围正日渐扩大，影响力也无可估量。
由于云计算应用的不断深入，以及对大数据处理需求的不断扩大，用户对性能强大、可用性高的4路、8路服务器需求出现明显提速，这一细分产品同比增速超过200%。
IBM在这一领域占有相当的优势，更值得关注的是，浪潮仅以天梭TS850一款产品在2011实现了超过15%的市场占有率，以不到1%的差距排名IBM，HP之后，成为中国高端服务器三强。
2012年浪潮斥资近十亿元研发的32路高端容错服务器天梭K1系统尚未面世，其巨大的市场潜力有待挖掘。
原文：Cloud computing is a model for enabling ubiquitous, convenient, on-demand network access to a shared pool of configurable computing resources (e.g., networks, servers, storage, applications, and services) that can be rapidly provisioned and released with minimal management effort or service provider interaction.
云计算常与网格计算、效用计算、自主计算相混淆。
网格计算：分布式计算的一种，由一群松散耦合的计算机组成的一个超级虚拟计算机，常用来执行一些大型任务；
效用计算：IT资源的一种打包和计费方式，比如按照计算、存储分别计量费用，像传统的电力等公共设施一样；
自主计算：具有自我管理功能的计算机系统。
事实上，许多云计算部署依赖于计算机集群（但与网格的组成、体系结构、目的、工作方式大相径庭），也吸收了自主计算和效用计算的特点。

####云计算特点
云计算是通过使计算分布在大量的分布式计算机上，而非本地计算机或远程服务器中，企业数据中心的运行将与互联网更相似。这使得企业能够将资源切换到需要的应用上，根据需求访问计算机和存储系统。
好比是从古老的单台发电机模式转向了电厂集中供电的模式。它意味着计算能力也可以作为一种商品进行流通，就像煤气、水电一样，取用方便，费用低廉。最大的不同在于，它是通过互联网进行传输的。
被普遍接受的云计算特点如下：
(1) 超大规模
“云”具有相当的规模，Google云计算已经拥有100多万台服务器， Amazon、IBM、微软、Yahoo等的“云”均拥有几十万台服务器。企业私有云一般拥有数百上千台服务器。“云”能赋予用户前所未有的计算能力。
(2) 虚拟化
云计算支持用户在任意位置、使用各种终端获取应用服务。所请求的资源来自“云”，而不是固定的有形的实体。应用在“云”中某处运行，但实际上用户无需了解、也不用担心应用运行的具体位置。只需要一台笔记本或者一个手机，就可以通过网络服务来实现我们需要的一切，甚至包括超级计算这样的任务。
(3) 高可靠性
“云”使用了数据多副本容错、计算节点同构可互换等措施来保障服务的高可靠性，使用云计算比使用本地计算机可靠。
(4) 通用性
云计算不针对特定的应用，在“云”的支撑下可以构造出千变万化的应用，同一个“云”可以同时支撑不同的应用运行。
(5) 高可扩展性
“云”的规模可以动态伸缩，满足应用和用户规模增长的需要。
(6) 按需服务
“云”是一个庞大的资源池，你按需购买；云可以像自来水，电，煤气那样计费。
(7) 极其廉价
由于“云”的特殊容错措施可以采用极其廉价的节点来构成云，“云”的自动化集中式管理使大量企业无需负担日益高昂的数据中心管理成本，“云”的通用性使资源的利用率较之传统系统大幅提升，因此用户可以充分享受“云”的低成本优势，经常只要花费几百美元、几天时间就能完成以前需要数万美元、数月时间才能完成的任务。
云计算可以彻底改变人们未来的生活，但同时也要重视环境问题，这样才能真正为人类进步做贡献,而不是简单的技术提升。
(8) 潜在的危险性
云计算服务除了提供计算服务外，还必然提供了存储服务。但是云计算服务当前垄断在私人机构（企业）手中，而他们仅仅能够提供商业信用。对于政府机构、商业机构（特别像银行这样持有敏感数据的商业机构）对于选择云计算服务应保持足够的警惕。一旦商业用户大规模使用私人机构提供的云计算服务，无论其技术优势有多强，都不可避免地让这些私人机构以“数据（信息）”的重要性挟制整个社会。对于信息社会而言，“信息”是至关重要的。另一方面，云计算中的数据对于数据所有者以外的其他用户云计算用户是保密的，但是对于提供云计算的商业机构而言确实毫无秘密可言。所有这些潜在的危险，是商业机构和政府机构选择云计算服务、特别是国外机构提供的云计算服务时，不得不考虑的一个重要的前提。

####云计算发展现状
亚马逊网络服务（AWS）推出了其桌面即服务（DaaS）WorkSpaces，进一步扩展其云生态系统。每个桌面都需要CPU、内存、存储、网络及GPU，而AWS提供了这些资源。在PaaS领域，亚马逊宣布EMR支持Impala之后，更推出了流计算服务Kinesis。
思科与VMware合作推出DaaS产品，该产品利用思科Validated Design框架整合VMware最近收购的Deskone技术为用户提供VDI服务。
微软在2013年推出Cloud OS云操作系统，包括Windows Server 2012 R2、System Center 2012 R2、Windows Azure Pack在内的一系列企业级云计算产品及服务。Windows Azure是云服务操作系统，可用于Azure Services平台的开发、服务托管以及服务管理环境。Windows Azure为开发人员提供随选的计算和存储环境，以便在Internet上通过Microsoft数据中心来托管、扩充及管理 Web 应用程式。
IBM在2013年推出基于OpenStack和其他现有云标准的私有云服务，并开发出一款能够让客户在多个云之间迁移数据的云存储软件——InterCloud，并正在为InterCloud申请专利，这项技术旨在向云计算中增加弹性，并提供更好的信息保护。IBM在2013年12月收购位于加州埃默里维尔市的Aspera公司。在提供安全性、宽控制和可预见性的同时， Aspera使基于云计算的大数据传输更快速，更可预测和更具性价比，比如企业存储备份、虚拟图像共享、或者快速进入云来增加处理事务的能力。FASP技术将与IBM最近收购的SoftLayer云计算基础架构进行整合。
甲骨文公司宣布成为OpenStack基金会赞助商，计划将OpenStack云管理组件集成到Oracle Solaris、Oracle Linux、Oracle VM、Oracle虚拟计算设备、Oracle基础架构即服务(IaaS)、Oracle ZS3系列、Axiom存储系统和StorageTek磁带系统中。并将努力促成OpenStack与Exalogic、Oracle云计算服务、Oracle存储云服务的相互兼容。OpenStack已经在业界获得了越来越多的支持，包括惠普、戴尔、IBM在内的众多传统硬件厂商已经宣布加入，并推出了基于OpenStack的云操作系统或类似产品。
惠普在2013年推出基于惠普HAVEn大数据分析平台的新的基于云的分析服务。惠普企业服务包括大数据和分析的端对端的解决方案，覆盖客户智能、供应链和运营、传感器数据分析等领域。
苹果iCloud是美国消费者使用量最大的云计算服务。苹果公司在2011年就推出了在线存储云服务iCloud。
在2013年8月，戴尔公司云客户端计算产品组合全新推出Dell Wyse ThinOS 8固件和Dell Wyse D10D云计算客户端。依托Dell Wyse，戴尔可为使用Citrix、微软、VMware和戴尔软件的企业提供各类安全、可管理、高性能的端到端桌面虚拟化解决方案。
美国AT&amp;T公司为企业提供了可按需灵活配置的云计算服务，可根据用户需求对安全、控制和性能进行组合配置。包括以服务的形式提供平台或计算能力、虚拟化等。
云计算及跨平台IT管理供应商CA Technologies在2013年11月推出针对System z的CA云存储技术，通过备份数据并将数据存档到云中，来帮助客户降低存储IBM大型机(IBM System z)上处理数据的成本。
推出开源云计算平台OpenStack的Rackspace公司在2013年10月收购以色列云技术公司ZeroVM。ZeroVM拥有专门为云而设计的hypervisor产品，该产品的设计兼顾了云计算的优势和局限性。
信息通讯技术服务供应商富士通于2013年4月在日本推出基于云计算的供应链风险管理服务SCRKeeper，用于高效准确评估和管理供应商的业务持续能力。
（二）发展趋势
1、云计算与CDN的界限更加模糊。CDN技术是DNS+Cache的模式，CDN服务商被称为“虚拟ISP”。CDN技术大量功能依赖软件系统实现，因此需要强大的容错、自恢复的技术支持。除了稳定性，还有按需扩展性、自动维护都是CDN所需要的，这正是“云计算平台”所能提供的。
2、开源技术正逐渐成为主流。SaaS（软件即服务）的出现，可减少对一些知名软件供应商的依赖性，如微软、甲骨文和SAP，现在每个公司开始看到机会。信息技术上的束缚越来越少，许多SaaS公司将其视为建造自己基础设施的方式。
3、公有云与私有云，从竞争关系变为互补。企业在从私有云安全性及可靠性中受益的同时，也利用了公有云的可扩展性和灵活性。未来对混合运算的需求会越来越多。
4、云Container技术是迁移应用更有效的途径。Container技术简化了部署和云应用的管理。未来主要发展Container封装和应用虚拟化技术，将每个独立用户分离在一个单独的Container中，并且使整个开发体验更好。
5、云计算技术的应用将提供更多的增值服务。在提供了基础架构技术之后，云存储供应商将提供存储服务等等。
四、国内云计算技术及产业现状
2012年5月，工业和信息化部发布《通信业“十二五”发展规划》，将云计算定位为构建国家级信息基础设施、实现融合创新的关键技术和重点发展方向。2012年9月，科技部发布首个部级云计算专项规划《中国云科技发展“十二五”专项规划》，对于加快云计算技术创新和产业发展具有重要意义。
我国云计算基础产品与操作系统技术方面取得显著进展。在云计算基础产品方面，我国已经突破EB级存储系统软、硬件技术和支持亿级任务并发处理的服务器系统技术。同时，互联网企业在大规模云计算操作系统方面取得突破，包括弹性计算系统、分布式计算系统、结构化数据存储系统和开放存储系统等。
2013年工业和信息化部正积极开展云计算综合标准的制定工作。在梳理现有各类信息技术标准的基础上制定新的云计算标准，修订已有的标准，建设形成满足行业管理和用户需求的云计算标准体系。
部分省市政府搭建云计算基础平台，推进云计算的发展
国家发改委、工信部将北京、上海、深圳、杭州、无锡、哈尔滨市确定为国家云计算服务创新发展试点城市。
北京云基地的建设。作为云计算、大数据时代基础设施的建设者和创新者，云基地各创业企业的产品和服务涵盖云计算各个环节，包括服务器、模块化数据中心、瘦终端等硬件产品的设计和生产，云中间件、云管理平台、桌面虚拟化等基础软件研发；大数据、智能知识库、分布式计算等应用软件，以及定制化云计算解决方案，构成完整的上下游和中间平台完备的云生态产业链。
上海市在2010年8月颁布推进云计算产业发展行动方案，即“云海计划”，“上海市云计算产业基地”在上海市北高新技术服务业园区落户。
深圳市将云计算作为“智慧深圳”的重要支撑纳入深圳市“十二五”发展规划。深圳云计算国际联合实验室在2011年4月正式揭牌，该实验室是深圳云计算产业协会联合英特尔、IBM、金蝶等国内外相关企业创建的专业性技术与应用研发实验室。深圳云计算中心在2012年1月完成验收。
杭州云计算产业园在2011年10月开园，形成以“技术创新、人才创新和运作模式创新”为支撑的云计算产业创新体系，打造云计算产业集聚区。杭州湾云计算(西湖云公共服务平台)是全国首家利用云计算技术服务于电子商务产业的政、产、学、研一体的公共服务平台。
无锡城市云计算中心在2013年8月正式启用，作为国内首个物联网云计算中心，无锡城市云计算中心大量使用自主知识产权的产品、技术和国产设备，有效保障了云服务的“安全、自主、可控”。该中心现已为无锡电子政务、物联网、移动互联网等关键应用提供云计算服务，逐渐形成开放的城市云生态体系。
哈尔滨市提出以“发挥政府引导作用，以电子政务建设为切入点，大力推进云计算技术应用，以应用带市场、以应用促招商、以应用谋发展”的工作思路，确定了“通过利用政府资源，实施云计算应用示范工程，培育和引进一批云计算骨干企业，形成一批自主知识产权的核心技术和拳头产品，实现一批在全国具有示范意义的典型应用”的工作任务。
合肥城市云数据中心是在国家发改委安徽省数据灾备外包服务中心的基础上，由合肥广电、科大国祯、鸿淦数据联手打造的高科技公共服务平台，是安徽省已落成的规模和级别最高的数据中心，致力于打造一流的云技术服务平台，为合肥智慧城市建设提供云计算相关服务，加快“智慧合肥”落地步伐。
企业和科研机构也在积极进行云计算相关项目的研发
曙光公司、NVIDIA公司、思杰公司在2014年1月共同合作推出基于GRID和CitrixXenDesktop技术的图形云计算产品——“云图”（W760-G10）,解决了GPU硬件虚拟化的技术难题，这是我国首款真正意义上的专用图形云计算产品。
阿里云于2013年12月在“飞天”平台之上启动一系列举措。包括低门槛入云策略、一亿元扶持计划、开发全新开发者服务平台等多项内容。从产品、价格、服务以及第三方合作等多个角度，打破传统商业模式，以用户第一的思维，创新云服务，构建更加健康的云计算生态圈。2013年10月，阿里云推出“飞天5K集群”项目，取得技术上的重大突破，拥有了只有Google、Facebook这样的顶级技术型IT公司才能达到的单集群规模达到5000台服务器的通用计算平台。
百度在2011年9月正式开放其云计算平台，在云计算基础架构和海量数据处理能力已较为成熟，将陆续开放IaaS、PaaS和SaaS等多层面的云平台服务，如云存储和虚拟机、应用执行引擎、智能数据分析和事件通知服务、网盘、地图、帐号和开放API等。百度云OS是云和端结合的通用性平台，以个人为中心来组织数据和应用，形成产品研发的统一、落地终端的统一、运营渠道的统一。云OS提供网页App化的功能，还将支持新型的WebApp。
浪潮集团已形成涵盖IaaS、PaaS、SaaS三个层面的云计算整体解决方案服务能力，建立包括HPC/IDC、媒体云、教育云等跨越十余个行业的云应用并成功在非洲、东南亚等地区进行推广。通过承担“高端容错”和“海量存储”两个国家863计划重大专项，“浪潮天梭K1关键应用主机”和“浪潮PB级高性能海量存储系统”均通过国家验收，并已成功在金融、税务等核心领域部署。在2013年，浪潮发布了其全新升级的云数据中心操作系统云海OS V3.0，该产品基于开放、融合的技术理念，能够帮助用户从孤立低效的传统数据中心向智能高效的云数据中心转变。
华为公司秉承开放的弹性云计算的理念，如推出了FusionCloud云战略，提供云数据中心、云计算产品、云服务解决方案。“ICT软硬件基础设施、顶层设计咨询服务和联合第三方开发智慧城市应用”是华为企业业务的三个主要方向，在云数据中心的基础上，实现“云-管-端”的分层建设，打造可以面向未来的城市系统框架。华为在2013年的应用案例，如天津LTE政务网（可为政府、公安等行业用户提供），采用的是华为基于TD-LTE技术的方案，直接支持数据、视频业务，并为未来专业集群、应急通信车等提供资源预留。
腾讯公司在2013年9月宣布腾讯云生态系统构建完成，将借助腾讯社交网络以及开放平台来专门推广腾讯云。
联想公司在2013年9月与虚拟化和云基础架构解决方案的领导厂商VMware共建的“联想威睿技术联合实验室”正式落成，将在服务器虚拟化、桌面虚拟化、云计算数据中心建设、基础架构管理与运维、数据容灾等技术领域进行合作，共同开发适合我国客户的解决方案。
中国移动在2013年发布“大云”2.5版本，实现从私有云向混合云性质转变，系统容量也从小规模试点发展到规模化商用，而在应用方面，也从原来的边缘性业务渗透到了关键核心业务中。
华云数据公司在国内拥有超过15个城市20个数据中心上万台物理服务器集群，网络覆盖中国电信、中国联通以及华云自有边界网关协议(BGP)网络，实现从边缘到核心网络的全覆盖。华云数据自主研发并推出我国首个运营型PaaS平台——中国云应用平台。
易云捷讯在2013年10月成功发布易云云操作系统最新版本EayunOS 3.2, 标志着国内首款基于OpenStack的商业化云计算平台成功落地。易云云操作系统提供包括服务器虚拟化、网络虚拟化、存储虚拟化、大数据存储以及云服务运营在内的平台级整体解决方案。
###在线教育
####在线教育概念
在线教育即E-Learning，其通行概念约在10年之前提出来，知行堂的学习教练肖刚将E-Learning定义为：通过应用信息科技和互联网技术进行内容传播和快速学习的方法。E-Learning的“E”代表电子化的学习、有效率的学习、探索的学习、经验的学习、拓展的学习、延伸的学习、易使用的学习、增强的学习。美国是e-Learning的发源地，有60%的企业通过网络的形式进行员工培训。1998年以后，e-Learning在世界范围内兴起，从北美、欧洲迅速扩展到亚洲地区。越来越多的国内企业对 e-Learning表示了浓厚兴趣，并开始实施e-Learning解决方案。
据美国培训与发展协会（ASTD）预测，到2010年，雇员人数超过500的公司90%都将采用e-Learning培训，e-Learning正成为知识经济时代的正确抉择。 需要特别指出的是，e-Learning（在线培训）不只是一种技术，技术只是传送内容的手段，重要的是是本身以及通过学习产生的巨大变革，这才是e-Learning（在线学习）主要意义。
在线教育顾名思义，是以网络为介质的教学方式，通过网络，学员与教师即使相隔万里也可以开展教学活动；此外，借助网络课件，学员还可以随时随地进行学习，真正打破了时间和空间的限制，对于工作繁忙，学习时间不固定的职场人而言网络远程教育是最方便不过的学习方式。在线教育的形式较多，比如：环球职业网校，游学网，101网校，北京四中网校，黄冈网校，新华网校、华图网校、新东方网校、中华会计网校、东奥会计在线等是针对在校学生，上网人员进行技术学习，而一些会计网则是代替课堂教育。对于网校，利用好就是自己的财富，利用不当，便是浪费资源。选择网校，一定要选择那些比较著名的网校，切不可因贪图便宜而上当受骗。

####在线教育现状
互联网就两块阵地还没有攻下，一个是医学健康，一个是教育。因此这两个领域恰恰是最后的创业狂欢盛宴。在互联网金融方向，去年大家还在谈趋势，今年创业者厮杀的眼都红了。
笔者多年一直在从事互联网教育行业的创业，希望大家和大家交流，共同把市场做大。互联网教育虽然发展很多年，但远远没有到成熟的时候。虽然近期以O2O教育名目融资频频，但对传统教育行业的冲击还根本谈不上。
虽然冰山已经漏出一角，和O2O无关。
互联网教育创业项目生生死死的经历，我总结出来一个判断网络教育项目的法门。
很简单，一切不能转变教师角色的互联网创业项目，本身都是在做基于地理位置的淘宝。
判断依据有三个。
第一：目前，互联网之所以没有改变教育，核心就是没有改变教师的角色。教师是教育服务中的最重要角色。
盖茨和默多克调侃现在的教室和几千年前一个样子的时候，我们都知道背后的含义。
尽管黑板变成了电子白板，钢笔变成了键盘，但老师教授学生知识的场景没有任何变化。
尽管MOOC或者翻转课堂对教学流程进行了改良，但从实践结果来看，老师主导知识传授、技能演示的主体地位并没有发生根本变化。
第二：现在，以O2O教育项目或者教育信息检索为核心的创业项目，从商业模式来看是革了传统中介的名，降低了获取商业信息的成本。
传统商品流通，经过层层渠道到达最终消费者手里，成本节节攀升。淘宝把渠道扁平化，降低了商业流通中的信息流通成本，所以价格低是结果而不是原因。假货、高仿只是扮演火上浇油的角色，而非根本。
教育或者培训是服务体验，远非商品交付那么简单。所以淘宝的玩法在传统培训和教育行业很难行的通，淘课网就是典型案例。这个很早就走教育淘宝模式的创业公司，起个大早也没有赶上晚集。
教育培训行业，老师只是产品核心，而不是完整的产品。培训公司是产品的组织者和中介，最终学员获得的是完整的服务。所以决胜网目前只针对机构，暂时屏蔽了老师个体。我和戴政同学不熟，他的直觉还是很准的。
第三：近期，资本推动的O2O教育项目繁荣，可能适得其反，让教育市场加剧价格战，劣币驱逐良币。
教育的淘宝这个概念或许让投机者青睐，但教育是个周期较长的产业，需要对教育产业有长远眼光的投资家，短期的浮躁投机一定会干扰优秀的创业者和企业家。
在线教育的专家秦宇老师曾经评价网络视频是僵尸课程，这某种程度上是对在线教育照猫画虎的讽刺。
在我看来，互联网教育产业的曙光已经扑面而来。借用某位老师的话说：“Online learning platforms willnot kill teachers’ jobs. It will just shift their focus”。
我同样认为，互联网教育的未来在于转变教师角色，让老师从单纯的知识传授变成学生思维方式和掌握新技能的教练。培训组织，是个贴心的服务商，老师需要，所以学生也需要他们。

###Sina App Engine
####Sina App Engine介绍
从产品的概念和发展历程方面来讲，Sina App Engine简称为SAE，是新浪研发中心于2009年8月开始内部开发，并在2009年11月3日正式推出第一个Alpha版本的国内首个公有云计算平台，SAE是新浪云计算战略的核心组成部分。具有以下几个特点：
　　1、SAE作为国内的公有云计算，从开发伊始借鉴吸纳Google、Amazon等国外公司的公有云计算的成功技术经验，并很快推出不同于他们的具有自身特色的云计算平台。
　　2、SAE选择在国内流行最广的Web开发语言PHP作为首选的支持语言，Web开发者可以在Linux/Mac/Windows上通过SVN、SDK或者Web版在线代码编辑器进行开发、部署、调试，团队开发时还可以进行成员协作，不同的角色将对代码、项目拥有不同的权限;
　　3、SAE提供了一系列分布式计算、存储服务供开发者使用，包括分布式文件存储、分布式数据库集群、分布式缓存、分布式定时服务等，这些服务将大大降低开发者的开发成本。同时又由于SAE整体架构的高可靠性和新浪的品牌保证，大大降低了开发者的运营风险。
　　4、作为典型的云计算，SAE采用“所付即所用，所付仅所用”的计费理念，通过日志和统计中心精确的计算每个应用的资源消耗(包括CPU、内存、磁盘等)。
　　总之，SAE就是简单高效的分布式Web服务开发、运行平台。

###Sina App Engine特点及长处
SAE从架构上采用分层设计，从上往下分别为反向代理层、路由逻辑层、Web计算服务池。而从Web计算服务层延伸出SAE附属的分布式计算型服务和分布式存储型服务，具体又分成同步计算型服务、异步计算型服务、持久化存储服务、非持久化存储服务。各种服务统一向日志和统计中心汇报，参考下图：

../_images/constructor.png
7层反向代理层：HTTP反向代理，在最外层，负责响应用户的HTTP请求，分析请求，并转发到后端的Web服务池上，并提供负载均衡、健康检查等功能。

服务路由层：逻辑层，负责根据请求的唯一标识，快速的映射（O(1)时间复杂度）到相应的Web服务池，并映射到相应的硬件路径。如果发现映射关系不存在或者错误，则给出相应的错误提示。该层对用户隐藏了很多具体地址信息，使开发者无需关心服务的内部实际分配情况。

Web服务池：由一些不同特性的Web服务池组成。每个Web服务池实际是由一组Apache Server组成的，这些池按照不同的SLA提供不同级别的服务。每个Web服务进程实际处理用户的HTTP请求，进程运行在HTTP服务沙盒内，同时还内嵌同样运行在SAE沙盒内的解析引擎。用户的代码最终通过接口调用各种服务。

日志和统计中心：负责对用户所使用的所有服务的配额进行统计和资源计费，这里的配额有两种，一种是分钟配额，用来保证整个平台的稳定；一种是天配额，用户可以给自己的设定每天资源消耗的最高上限。日志中心负责将用户所有服务的日志汇总并备份，并提供检索查询服务。

各种分布式服务：SAE提供覆盖Web应用开发所需的多种服务，用户可以通过客户端很方便的调用它们。同时因为Web服务的多样性，SAE的标准服务不可能满足所有场景的需求，所以SAE通过服务总线来对接第三方服务（如LBS、转码、人脸识别、短信等），SAE也欢迎第三方服务商接入。

多层沙盒隔离：真正的用户代码是跑在SAE提供的Web运行环境下的，为了提供公有云计算特有的安全性，SAE设计多层沙盒来保证用户应用之间的隔离性。

扩展性
扩展性是分布式系统的两个主要目的之一，SAE作为公有云计算，同样把服务的扩展性作为架构设计的重要指标，要求在用户增长、压力提升的情况下，可以实现自动的服务扩展，同样的当压力降低时，可以将服务收缩，以节约资源，整个过程无需人工参与。SAE人工只需做好容量规划和管理。目前国外的公有云计算架构的扩展性主要有两个思路：

静态扩展，用户和资源有强绑定关系。最典型的例子为亚马逊的EC2和Ruby云计算平台Heroku，用户申请的资源和用户有严格的一对一关系，换句话说，A用户申请的虚拟机在A退还资源前，B用户不能使用，哪怕A用户的虚拟机处于闲置状态。

动态扩展，用户和资源没有强绑定关系。最典型的例子为Google App Engine，用户申请的资源和用户没有严格的一对一关系，换句话说，处理A用户请求的进程在处理完之后，可以马上处理B用户的请求。

两种扩展性各有利弊，静态扩展的长处是为平台提供了良好的隔离性，资源可以固定的映射在某个用户下，但缺点是资源利用率不高；动态扩展的长处是资源利用率高，这样整个云计算平台的成本会很低，但缺点是对隔离性有更高的要求，因为资源可以在很短的时间被多个用户使用。相比较，在安全性上，动态扩展要比静态扩展的技术门槛更高。

在SAE平台上，我们采用以动态扩展为主，静态扩展为辅的兼而有之的设计。在Web计算池层，是典型的动态扩展，没有一个用户独占Web服务进程，而是所有用户以共享的方式使用Web服务进程，通过Cache，热的用户自然在缓存层占据更多的位置。而在SAE的某些服务中，扩展性又是以静态扩展的方式展现，如RDC（Relational DB Cluster）分布式数据库集群，当用户申请了MySQL服务，我们就会在RDC后端根据SLA的级别创建一主多从的DB给用户，在用户显式的删除该DB前，该DB都不会被别人使用。当然，通过RDC，任何一个用户也无需知道后端DB的实际地址，只需访问RDC统一的host和port即可。

高可靠性
HA是分布式系统的另一个主要目的，SAE同样以提供服务的高可靠性为架构设计的重要指标。HA的实现途径主要有两个，一个是硬件保证，一个是架构的冗余设计。

在SAE平台上，所有服务器都是新浪标准采购的硬件设备，运行在国内最好机房内，并进行多机房容灾，网络资源方面则享用门户网站所使用的带宽环境。另外，所有的硬件设备都有专门的运维部门负责，故障的响应速度和新浪内部服务一样。

在架构设计上，SAE通过对所有服务都进行冗余设计来提供服务的高可靠性。这里的服务可以分成计算型和数据型两种类别讨论：

针对计算型程序，冗余设计就是程序在多节点运行。但这样会带来一致性问题，最主要的困扰就是选举问题，如何在多个节点中选出一个主节点来执行。比如SAE上的分布式定时服务Cron，采用多点部署方式，多个计算节点相互隔离，通过时钟同步服务同时触发用户设定的定时任务，但要求只能有一个节点负责执行。为了解决这个问题，SAE设计出了一套分布式锁算法来提供选举服务。该算法可以在牺牲某些特定条件下的一致性来提供比Paxos算法更高的可靠性（3台机器在最高任意2台机器发生故障的情况下整个选举过程仍然正常，而Paxos算法最多容忍1台）。目前，该算法已经申请专利，并广泛应用在SAE内部。

针对数据型服务，SAE主要是通过复制来保证服务的高可靠性。SAE上的数据存储服务普遍采用被动复制和主动复制两种方式。如SAE上MySQL之间的主从Binlog同步就是典型的被动复制，TaskQueue、DeferredJob等服务也采用被动复制的方式，用户的任务描述会写到到主内存级队列中，主队列利用后台线程将写操作同步到从队列上，一旦主队列发生故障，从队列会快速的切换为主队列。另外SAE上也有部分服务采用主动复制（双写复制）的方式来保证HA，比如Cron，当用户通过App的工程配置文件appconfig.yaml设定定时任务时，任务信息会以双写的方式写到多个持久化DB中，以供后续的到时触发。

另外，SAE在整体架构设计时，充分考虑服务之间的“优雅降级”，尽量降低服务之间的耦合度，我们要求任何一个服务都不要假设其他服务是可靠的。目前在SAE平台上的所有服务均不存在单点设计，服务的平均HA在99.95%，即年平均服务不可用时间在4到5个小时之间。


##分析与设计
###竞品分析
百度文库
豆丁网

###需求分析
####需求描述
整个系统分为两部分：前台及管理员后台，下面将分开进行说明。
前台即网站用户用到的所有页面，后台即管理员的
前台按用户类别有不同的功能，描述如下：
未登录用户即为普通的访问者，他们具有的权限是查看公开分享的资料，但是无法下载，
###概要设计
###详细设计

##实现
###编码
####v1.0
####v2.0
###测试

##总结与展望

##参考文献

##致谢