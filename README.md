# Boxalino Data Integration Doc

## Introduction
This repository provides the data structure elements for the Data Integration **DI** strategy as described
in the official documentation https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252149803/Data+Integration

  * The [Data Structure](https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252280881/Data+Structure) schemas are translated to
data contracts (as seen [here](https://github.com/boxalino/data-integration-doc-php/tree/master/src/Doc))
  * [Generator](https://github.com/boxalino/data-integration-doc-php/tree/master/src/Generator) structures can be used to
generate each type of doc_ JSONL
  * [Integration handlers](https://github.com/boxalino/data-integration-doc-php/tree/master/src/Service/Integration) are used in the DI strategies
  * [Flow traits](https://github.com/boxalino/data-integration-doc-php/tree/master/src/Service/Flow) will provide insight into the structure of the GCP requests and data load strategies.

You can review the elements used for the endpoint requests in the [GcpRequestInterface](https://github.com/boxalino/data-integration-doc-php/tree/master/src/Service/GcpRequestInterface.php);

## How to use
This repository is used as a dependency in framework integrations (Magento2, Shopware6) and public Boxalino Data Structure Transform services.

## Contact us!
If you have any question, just contact us at support@boxalino.com
