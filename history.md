## [Under development]

## [3.0.1] - 2021-09-29

- Add getting payment method from request
    - [5b7c790] 2021-04-14 add getting payment method from request [@BladeRoot]
- `money.yandex.ru` got changed to `yoomoney.ru`
    - [95201e2] 2021-03-16 money.yandex.ru => yoomoney.ru [@BladeRoot]
    - [c1a5c0b] 2021-09-29 Fix tests [@SilverFire]
- Do not ask additinal client data by default
    - [fc4ea4a] 2021-03-18 Merge pull request #3 from bladeroot/ask-client-info [@SilverFire]
    - [c4b97c9] 2021-04-14 do not ask client data [@BladeRoot]
- Other minor changes
    - [1389d57] 2021-03-15 add dinamical parametr [@BladeRoot]
    - [1695603] 2021-03-16 type hinting [@BladeRoot]
    - [92e8f05] 2021-04-14 Merge pull request #4 from bladeroot/yandexmoney-improvment [@SilverFire]

## [3.0.0] - 2019-10-17

- Update to Omnipay v3
    - [a34b45f] 2019-10-17 Update to Omnipay v3 [@SilverFire]

## [1.1.1] - 2019-08-05

- Implemented fees calcultaion
    - [92505b0] 2019-08-05 Argh... It's vise-versa... [@SilverFire]

## [1.1.0] - 2019-08-05

    - [56ca4e3] 2019-08-05 Implemented fee calcultaion [@SilverFire]
    - [b00ff2e] 2017-08-06 csfixed [@hiqsol]

## [1.0.0] - 2017-03-30

- Implemented P2P money trasfer
    - [6c4d38f] 2017-03-30 Renames AbstractRequest::getSecretKey() -> getSecret() [@SilverFire]
    - [7fcee6b] 2017-03-30 Improved tests [@SilverFire]
    - [894168d] 2017-03-30 csfixed [@SilverFire]
    - [c80565b] 2017-03-30 Implemented tests [@SilverFire]
    - [49fe7ef] 2017-03-30 hideved [@SilverFire]
    - [1ecfce9] 2017-03-30 Added CompletePurchaseResponse::getCurrencyId() [@SilverFire]
    - [40058fb] 2017-03-30 Basic implementation of p2p merchant [@SilverFire]
    - [5c1e774] 2016-01-18 fixed build [@hiqsol]
    - [5f4507a] 2015-12-11 removed assets, now in `payment-icons` [@hiqsol]
    - [3bce72b] 2015-11-11 fixed namespace [@hiqsol]
    - [e530fdd] 2015-11-09 php-cs-fixed [@hiqsol]
    - [b4b79e3] 2015-11-09 started redoing to 'omnipay-yandexmoney' [@hiqsol]
    - [0d43345] 2015-10-31 fixed '_secret' <- 'secret' [@hiqsol]
    - [57a0f95] 2015-10-30 changed: redone to 'system' <- 'name' [@hiqsol]
    - [2bb50e0] 2015-10-23 php-cs-fixed [@hiqsol]
    - [e901012] 2015-10-23 hideved [@hiqsol]
    - [fa5f24f] 2015-10-23 inited [@hiqsol]

## [Development started] - 2015-10-23

## [dev] - 2019-10-17

[@hiqsol]: https://github.com/hiqsol
[sol@hiqdev.com]: https://github.com/hiqsol
[@SilverFire]: https://github.com/SilverFire
[d.naumenko.a@gmail.com]: https://github.com/SilverFire
[@tafid]: https://github.com/tafid
[andreyklochok@gmail.com]: https://github.com/tafid
[@BladeRoot]: https://github.com/BladeRoot
[bladeroot@gmail.com]: https://github.com/BladeRoot
[6c4d38f]: https://github.com/hiqdev/omnipay-yandexmoney/commit/6c4d38f
[7fcee6b]: https://github.com/hiqdev/omnipay-yandexmoney/commit/7fcee6b
[894168d]: https://github.com/hiqdev/omnipay-yandexmoney/commit/894168d
[c80565b]: https://github.com/hiqdev/omnipay-yandexmoney/commit/c80565b
[49fe7ef]: https://github.com/hiqdev/omnipay-yandexmoney/commit/49fe7ef
[1ecfce9]: https://github.com/hiqdev/omnipay-yandexmoney/commit/1ecfce9
[40058fb]: https://github.com/hiqdev/omnipay-yandexmoney/commit/40058fb
[5c1e774]: https://github.com/hiqdev/omnipay-yandexmoney/commit/5c1e774
[5f4507a]: https://github.com/hiqdev/omnipay-yandexmoney/commit/5f4507a
[3bce72b]: https://github.com/hiqdev/omnipay-yandexmoney/commit/3bce72b
[e530fdd]: https://github.com/hiqdev/omnipay-yandexmoney/commit/e530fdd
[b4b79e3]: https://github.com/hiqdev/omnipay-yandexmoney/commit/b4b79e3
[0d43345]: https://github.com/hiqdev/omnipay-yandexmoney/commit/0d43345
[57a0f95]: https://github.com/hiqdev/omnipay-yandexmoney/commit/57a0f95
[2bb50e0]: https://github.com/hiqdev/omnipay-yandexmoney/commit/2bb50e0
[e901012]: https://github.com/hiqdev/omnipay-yandexmoney/commit/e901012
[fa5f24f]: https://github.com/hiqdev/omnipay-yandexmoney/commit/fa5f24f
[Under development]: https://github.com/hiqdev/omnipay-yandexmoney/compare/3.0.0...HEAD
[1.0.0]: https://github.com/hiqdev/omnipay-yandexmoney/releases/tag/1.0.0
[56ca4e3]: https://github.com/hiqdev/omnipay-yandexmoney/commit/56ca4e3
[b00ff2e]: https://github.com/hiqdev/omnipay-yandexmoney/commit/b00ff2e
[1.1.0]: https://github.com/hiqdev/omnipay-yandexmoney/compare/1.0.0...1.1.0
[92505b0]: https://github.com/hiqdev/omnipay-yandexmoney/commit/92505b0
[1.1.1]: https://github.com/hiqdev/omnipay-yandexmoney/compare/1.1.0...1.1.1
[a34b45f]: https://github.com/hiqdev/omnipay-yandexmoney/commit/a34b45f
[3.0.0]: https://github.com/hiqdev/omnipay-yandexmoney/compare/1.1.1...3.0.0
[c1a5c0b]: https://github.com/hiqdev/omnipay-yandexmoney/commit/c1a5c0b
[c4b97c9]: https://github.com/hiqdev/omnipay-yandexmoney/commit/c4b97c9
[92e8f05]: https://github.com/hiqdev/omnipay-yandexmoney/commit/92e8f05
[5b7c790]: https://github.com/hiqdev/omnipay-yandexmoney/commit/5b7c790
[fc4ea4a]: https://github.com/hiqdev/omnipay-yandexmoney/commit/fc4ea4a
[95201e2]: https://github.com/hiqdev/omnipay-yandexmoney/commit/95201e2
[1695603]: https://github.com/hiqdev/omnipay-yandexmoney/commit/1695603
[1389d57]: https://github.com/hiqdev/omnipay-yandexmoney/commit/1389d57
[Development started]: https://github.com/hiqdev/omnipay-yandexmoney/compare/dev...Development started
[3.0.1]: https://github.com/hiqdev/omnipay-yandexmoney/compare/3.0.0...3.0.1
