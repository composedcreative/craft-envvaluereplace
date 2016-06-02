# Environment Value Replacement Twig filter for Craft CMS

## Installation

`composer require composed/envvaluereplace`

## Example

Add the following to either the general or per-environment `config/general.php` values

```
'envValueReplacements' => [
    'search for' => 'replace with'
]
```

Then use in your template code
```
{% set test = "this string contains the search for value" %}
{{ test|envValueReplace }}
```

This example will output `this string contains the replace with value`

## Roadmap

* Improve documentation (eg chained replacement example)
