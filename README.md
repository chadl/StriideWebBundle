StriideWebBundle
================

The intent behind this widget is to provide we-centric behaviour and tools

Currently, this bundle offers the following twig globals:

* is_production
* is_development

To be used like:

{% if is_production %}
show something that is only in production
{% endif %}

Similarily,

{% if is_development %}
show something that is only in development
{% endif %}

Routing
-------

StriideWebBundle:
    resource: "@StriideWebBundle/Resources/config/routing.yml"
    prefix:   /
