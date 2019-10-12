# Release Notes for 5.8.x

## [Unreleased](https://github.com/laravel/framework/compare/v5.8.35...5.8)


## [v5.8.35 (2019-09-03)](https://github.com/laravel/framework/compare/v5.8.34...v5.8.35)

### Added
- Added support of `NOT RLIKE` SQL operator ([#29788](https://github.com/laravel/framework/pull/29788))
- Added hebrew letters to `Str:slug` language array ([#29838](https://github.com/laravel/framework/pull/29838), [ba772d6](https://github.com/laravel/framework/commit/ba772d643b88a4646c1161f5325e52de81d7a709))
- Added support of `php7.4` ([#29842](https://github.com/laravel/framework/pull/29842))

### Fixed
- Fixed self-referencing `MorphOneOrMany` existence queries ([#29765](https://github.com/laravel/framework/pull/29765))
- Fixed `QueueFake::size()` method ([#29761](https://github.com/laravel/framework/pull/29761), [ddaf6e6](https://github.com/laravel/framework/commit/ddaf6e63326263a9bb3732e887a2bf8b2381caa1))

### Changed
- Added note that the GD extension is required for generating images ([#29770](https://github.com/laravel/framework/pull/29770), [#29831](https://github.com/laravel/framework/pull/29831))
- Changed `monolog/monolog` version to `^1.12` ([#29837](https://github.com/laravel/framework/pull/29837))


## [v5.8.34 (2019-08-27)](https://github.com/laravel/framework/compare/v5.8.33...v5.8.34)

### Fixed
- Fixed `MailMessage::render()` if `view` method was used ([#29698](https://github.com/laravel/framework/pull/29698))
- Fixed setting of numeric values as model attribute ([#29714](https://github.com/laravel/framework/pull/29714)) 
- Fixed mocking of events `until` method in `MocksApplicationServices` ([#29708](https://github.com/laravel/framework/pull/29708))
- Fixed: Use custom attributes in lt/lte/gt/gte rules messages ([#29716](https://github.com/laravel/framework/pull/29716))

### Changed:
- Changed applying of Aws Instance Profile ([#29738](https://github.com/laravel/framework/pull/29738))


## [v5.8.33 (2019-08-20)](https://github.com/laravel/framework/compare/v5.8.32...v5.8.33)

### Added
- Added `ValidatesWhenResolvedTrait::passedValidation()` callback ([#29549](https://github.com/laravel/framework/pull/29549))
- Implement new types for email validation support ([#29589](https://github.com/laravel/framework/pull/29589))
- Added Redis 5 support ([#29606](https://github.com/laravel/framework/pull/29606))
- Added `insertOrIgnore` support ([#29639](https://github.com/laravel/framework/pull/29639), [46d7e96](https://github.com/laravel/framework/commit/46d7e96ab3ab59339ef0ea8802963b2db84f9ab3), [#29645](https://github.com/laravel/framework/pull/29645))
- Allowed to override the existing `Whoops` handler.([#29564](https://github.com/laravel/framework/pull/29564))

### Fixed
- Fixed non-displayable boolean values in validation messages ([#29560](https://github.com/laravel/framework/pull/29560))
- Avoid undefined index errors when using AWS IAM ([#29565](https://github.com/laravel/framework/pull/29565))
- Fixed exception message in the `ProviderRepository::writeManifest()` ([#29568](https://github.com/laravel/framework/pull/29568))
- Fixed invalid link expiry count in ResetPassword ([#29579](https://github.com/laravel/framework/pull/29579))
- Fixed command testing of `output` and `questions` expectations ([#29580](https://github.com/laravel/framework/pull/29580))
- Added ignoring of classes which are not instantiable during event discovery ([#29587](https://github.com/laravel/framework/pull/29587))
- Used real classname for seeders in the output ([#29601](https://github.com/laravel/framework/pull/29601))

### Refactoring
- Simplified `isset()` ([#29581](https://github.com/laravel/framework/pull/29581))


## [v5.8.32 (2019-08-13)](https://github.com/laravel/framework/compare/v5.8.31...v5.8.32)

### Fixed
- Fixed top level wildcard validation for `distinct` validator ([#29499](https://github.com/laravel/framework/pull/29499))
- Fixed resolving of columns with schema references in Postgres ([#29448](https://github.com/laravel/framework/pull/29448))
- Only remove the event mutex if it was created ([#29526](https://github.com/laravel/framework/pull/29526))
- Fixed restoring serialized collection with deleted models ([#29533](https://github.com/laravel/framework/pull/29533), [74b62bb](https://github.com/laravel/framework/commit/74b62bbbb32674dfa167e2812231bf302454e67f))


## [v5.8.31 (2019-08-06)](https://github.com/laravel/framework/compare/v5.8.30...v5.8.31)

### Fixed
- Fixed FatalThrowableError in `updateExistingPivot()` when pivot is non-existent ([#29362](https://github.com/laravel/framework/pull/29362))
- Fixed worker timeout handler when there is no job processing ([#29366](https://github.com/laravel/framework/pull/29366))
- Fixed `assertJsonValidationErrors()` with muliple messages ([#29380](https://github.com/laravel/framework/pull/29380))
- Fixed UPDATE queries with alias ([#29405](https://github.com/laravel/framework/pull/29405))

### Changed
- `Illuminate\Cache\ArrayStore::forget()` returns false on missing key ([#29427](https://github.com/laravel/framework/pull/29427))
- Allow chaining on `QueryBuilder::dump()` method ([#29437](https://github.com/laravel/framework/pull/29437))
- Change visibility to public for `hasPivotColumn()` method ([#29367](https://github.com/laravel/framework/pull/29367))
- Added line break for plain text mails ([#29408](https://github.com/laravel/framework/pull/29408))
- Use `date_create` to prevent date validator warnings ([#29342](https://github.com/laravel/framework/pull/29342), [#29389](https://github.com/laravel/framework/pull/29389))


## [v5.8.30 (2019-07-30)](https://github.com/laravel/framework/compare/v5.8.29...v5.8.30)

### Added
- Added `MakesHttpRequests::option()` and `MakesHttpRequests::optionJson()` methods ([#29258](https://github.com/laravel/framework/pull/29258))
- Added `Blueprint::uuidMorphs()` and `Blueprint::nullableUuidMorphs()` methods ([#29289](https://github.com/laravel/framework/pull/29289))
- Added `MailgunTransport::getEndpoint()` and `MailgunTransport::setEndpoint()` methods ([#29312](https://github.com/laravel/framework/pull/29312))
- Added `WEBP` to image validation rule ([#29309](https://github.com/laravel/framework/pull/29309))
- Added `TestResponse::assertSessionHasInput()` method ([#29327](https://github.com/laravel/framework/pull/29327))
- Added support for custom redis driver ([#29275](https://github.com/laravel/framework/pull/29275))
- Added Postgres support for `collation()` on columns ([#29213](https://github.com/laravel/framework/pull/29213))

### Fixed
- Fixed collections with JsonSerializable items and mixed values ([#29205](https://github.com/laravel/framework/pull/29205))
- Fixed MySQL Schema Grammar `$modifiers` order ([#29265](https://github.com/laravel/framework/pull/29265))
- Fixed UPDATE query bindings on PostgreSQL ([#29272](https://github.com/laravel/framework/pull/29272))
- Fixed default theme for Markdown mails ([#29274](https://github.com/laravel/framework/pull/29274))
- Fixed UPDATE queries with alias on SQLite ([#29276](https://github.com/laravel/framework/pull/29276))
- Fixed UPDATE and DELETE queries with join bindings on PostgreSQL ([#29306](https://github.com/laravel/framework/pull/29306))
- Fixed support of `DateTime` objects and `int` values in `orWhereDay()`, `orWhereMonth()`, `orWhereYear()` methods in the `Builder` ([#29317](https://github.com/laravel/framework/pull/29317))
- Fixed DELETE queries with joins on PostgreSQL ([#29313](https://github.com/laravel/framework/pull/29313))
- Prevented a job from firing if job marked as deleted ([#29204](https://github.com/laravel/framework/pull/29204), [1003c27](https://github.com/laravel/framework/commit/1003c27b73f11472c1ebdb9238b839aefddfb048))
- Fixed model deserializing with custom `Model::newCollection()` ([#29196](https://github.com/laravel/framework/pull/29196))

### Reverted
- Reverted: [Added possibility for `WithFaker::makeFaker()` use local `app.faker_locale` config](https://github.com/laravel/framework/pull/29123) ([#29250](https://github.com/laravel/framework/pull/29250))

### Changed
- Allocate memory for error handling to allow handling memory exhaustion limits ([#29226](https://github.com/laravel/framework/pull/29226))
- Teardown test suite after using fail() method ([#29267](https://github.com/laravel/framework/pull/29267))


## [v5.8.29 (2019-07-16)](https://github.com/laravel/framework/compare/v5.8.28...v5.8.29)

### Added
- Added possibility for `WithFaker::makeFaker()` use local `app.faker_locale` config ([#29123](https://github.com/laravel/framework/pull/29123))
- Added ability to set theme for mail notifications ([#29132](https://github.com/laravel/framework/pull/29132))
- Added runtime for each migration to output ([#29149](https://github.com/laravel/framework/pull/29149))
- Added possibility for `whereNull` and `whereNotNull` to accept array columns argument ([#29154](https://github.com/laravel/framework/pull/29154))
- Allowed `Console\Scheduling\ManagesFrequencies::hourlyAt()` to accept array of integers ([#29173](https://github.com/laravel/framework/pull/29173))

### Performance
- Improved eager loading performance for MorphTo relation ([#29129](https://github.com/laravel/framework/pull/29129))

### Fixed
- Fixed `Builder::whereDay()` and `Builder::whereMonth()` with raw expressions
- Fixed DELETE queries with alias on SQLite ([#29164](https://github.com/laravel/framework/pull/29164))
- Fixed queue jobs using SerializesModels losing order of passed in collections ([#29136](https://github.com/laravel/framework/pull/29136))
- Fixed conditional binding for nested optional dependencies ([#29180](https://github.com/laravel/framework/pull/29180))
- Fixed: validator not failing on custom rule when message is null ([#29174](https://github.com/laravel/framework/pull/29174))
- Fixed DELETE query bindings ([#29165](https://github.com/laravel/framework/pull/29165))


## [v5.8.28 (2019-07-09)](https://github.com/laravel/framework/compare/v5.8.27...v5.8.28)

### Added
- Make TestResponse tappable ([#29033](https://github.com/laravel/framework/pull/29033))
- Added `Support\Collection::mergeRecursive()` method ([#29084](https://github.com/laravel/framework/pull/29084))
- Added `Support\Collection::replace()` and `Support\Collection::replaceRecursive()` methods ([#29088](https://github.com/laravel/framework/pull/29088))
- Added `Session\Store::only()` method ([#29107](https://github.com/laravel/framework/pull/29107))

### Fixed
- Fixed cache repository setMultiple with an iterator ([#29039](https://github.com/laravel/framework/pull/29039))
- Fixed cache repository getMultiple implementation ([#29047](https://github.com/laravel/framework/pull/29047))

### Reverted
- Reverted [Fixed: app.stub for jquery components loading](https://github.com/laravel/framework/pull/29001) ([#29109](https://github.com/laravel/framework/pull/29109))

### Changed
- Fail job immediately after it timeouts if it wont be retried ([#29024](https://github.com/laravel/framework/pull/29024))


## [v5.8.27 (2019-07-02)](https://github.com/laravel/framework/compare/v5.8.26...v5.8.27)

### Added
- Let `mix` helper use `app.mix_url` config ([#28952](https://github.com/laravel/framework/pull/28952))
- Added `RedisManager::setDriver()` method ([#28985](https://github.com/laravel/framework/pull/28985))
- Added `whereHasMorph()` and corresponding methods to work with `MorphTo` relations ([#28928](https://github.com/laravel/framework/pull/28928))

### Fixed
- Fixed: Changing a database field to binary include `collation` ([#28975](https://github.com/laravel/framework/pull/28975))
- Fixed [app.stub for jquery components loading](https://github.com/laravel/framework/issues/28984) ([#29001](https://github.com/laravel/framework/pull/29001))
- Fixed equivalent for greek letter theta in `Str::ascii()` ([#28999](https://github.com/laravel/framework/pull/28999))

### Changed
- Prevented `TestResponse::dump()` and `TestResponse::dumpHeaders()` methods from ending execution of the script ([#28960](https://github.com/laravel/framework/pull/28960))
- Allowed `TestResponse::dump()` and `TestResponse::dumpHeaders()` methods chaining ([#28967](https://github.com/laravel/framework/pull/28967))
- Allowed to `NotificationFake` accept custom channels ([#28969](https://github.com/laravel/framework/pull/28969))
- Replace contents of service manifest atomically ([#28973](https://github.com/laravel/framework/pull/28973))
- Pass down the `serverVersion` database connection option to Doctrine DBAL connection ([#28964](https://github.com/laravel/framework/pull/28964), [1b55b28](https://github.com/laravel/framework/commit/1b55b289788d5c49187481e421d949fe409a27c1))
- Replace `self::` with `static::` in the `Relation::getMorphedModel()` ([#28974](https://github.com/laravel/framework/pull/28974))
- Set a message for `SuspiciousOperationException` ([#29000](https://github.com/laravel/framework/pull/29000))
- Storing Mailgun Message-ID in the headers after sending ([#28994](https://github.com/laravel/framework/pull/28994))


## [v5.8.26 (2019-06-25)](https://github.com/laravel/framework/compare/v5.8.25...v5.8.26)

### Reverted
- Reverted: [Let `mix` helper use `app.asset_url`](https://github.com/laravel/framework/pull/28905) ([#28950](https://github.com/laravel/framework/pull/28950))


## [v5.8.25 (2019-06-25)](https://github.com/laravel/framework/compare/v5.8.24...v5.8.25)

### Added
- Added `json` option to `route:list` command ([#28894](https://github.com/laravel/framework/pull/28894))

### Fixed
- Fixed columns parameter on paginate method ([#28937](https://github.com/laravel/framework/pull/28937))
- Prevent event cache from firing multiple times the same event(s) ([#28904](https://github.com/laravel/framework/pull/28904))
- Fixed `TestResponse::assertJsonMissingValidationErrors()` on empty response ([#28595](https://github.com/laravel/framework/pull/28595), [#28913](https://github.com/laravel/framework/pull/28913))
- Fixed percentage sign in filename fallback in the `FilesystemAdapter::response()` ([#28947](https://github.com/laravel/framework/pull/28947))

### Changed
- Allow `TestResponse::assertViewHas()` to see all data ([#28893](https://github.com/laravel/framework/pull/28893))
- Let `mix` helper use `app.asset_url` ([#28905](https://github.com/laravel/framework/pull/28905))


## [v5.8.24 (2019-06-19)](https://github.com/laravel/framework/compare/v5.8.23...v5.8.24)

### Added
- Added possibility to assert that the session contains a given piece of data using a closure in `TestResponse::assertSessionHas()` ([#28837](https://github.com/laravel/framework/pull/28837))
- Added `TestResponse::assertUnauthorized()` ([#28851](https://github.com/laravel/framework/pull/28851))
- Allowed to define port in `ServeCommand` via `SERVER_PORT` env variable ([#28849](https://github.com/laravel/framework/pull/28849), [6a18e73](https://github.com/laravel/framework/commit/6a18e73f63f46b6aa5ab6faceb9eb5060c64fc15))
- Allowed console environment argument to be separated with a space ([#28869](https://github.com/laravel/framework/pull/28869))
- Added `@endcomponentFirst` directive ([#28884](https://github.com/laravel/framework/pull/28884))
- Added optional parameter `$when` to `retry` helper ([85c0801](https://github.com/laravel/framework/commit/85c08016c424f6c8e45f08282523f8785eda9673))

### Fixed
- Fixed `Builder::dump()` and `Builder::dd()` with global scopes ([#28858](https://github.com/laravel/framework/pull/28858))

### Reverted
- Reverted: [Automatically bind the viewAny method to the index controller action](https://github.com/laravel/framework/pull/28820) ([#28865](https://github.com/laravel/framework/pull/28865))

### Changed
- Handle `SuspiciousOperationException` in router as `NotFoundHttpException` ([#28866](https://github.com/laravel/framework/pull/28866))


## [v5.8.23 (2019-06-14)](https://github.com/laravel/framework/compare/v5.8.22...v5.8.23)

### Fixed
- Fixed strict comparison in redis configuration Parsing. ([#28830](https://github.com/laravel/framework/pull/28830))

### Changed
- Improved support for arrays on `TestResponse::assertJsonValidationErrors()` ([2970dab](https://github.com/laravel/framework/commit/2970dab3944e3b37578fa193503aae4217c62e59))


## [v5.8.22 (2019-06-12)](https://github.com/laravel/framework/compare/v5.8.21...v5.8.22)

### Added
- Added `@componentFirst` directive ([#28783](https://github.com/laravel/framework/pull/28783))
- Added support for typed eager loads ([#28647](https://github.com/laravel/framework/pull/28647), [d72e3cd](https://github.com/laravel/framework/commit/d72e3cd5be14dba654837466564018403839a5e9))
- Added `Related` and `Recommended` to Pluralizer ([#28749](https://github.com/laravel/framework/pull/28749))
- Added `Str::containsAll()` method ([#28806](https://github.com/laravel/framework/pull/28806))
- Added: error handling for maintenance mode commands ([#28765](https://github.com/laravel/framework/pull/28765), [9e20849](https://github.com/laravel/framework/commit/9e20849e5cca7b98ebf0eee2b563b532ff6fe704))
- Added message value assertion to `TestResponse::assertJsonValidationErrors()` ([#28787](https://github.com/laravel/framework/pull/28787))
- Added: Automatically bind the viewAny method to the index controller action ([#28820](https://github.com/laravel/framework/pull/28820))

### Fixed
- Fixed database rules with where clauses ([#28748](https://github.com/laravel/framework/pull/28748))
- Fixed: MorphTo Relation ignores parent $timestamp when touching ([#28670](https://github.com/laravel/framework/pull/28670))
- Fixed: Sql Server issue during `dropAllTables` when foreign key constraints exist ([#28750](https://github.com/laravel/framework/pull/28750), [#28770](https://github.com/laravel/framework/pull/28770))
- Fixed `Model::getConnectionName()` when `Model::cursor()` used ([#28804](https://github.com/laravel/framework/pull/28804))

### Changed
- Made `force` an optional feature when using `ConfirmableTrait`. ([#28742](https://github.com/laravel/framework/pull/28742))
- Suggest resolution when no relationship value is returned in the `Model::getRelationshipFromMethod()` ([#28762](https://github.com/laravel/framework/pull/28762))


## [v5.8.21 (2019-06-05)](https://github.com/laravel/framework/compare/v5.8.20...v5.8.21)

### Fixed
- Fixed redis cluster connection parsing ([2bcb405](https://github.com/laravel/framework/commit/2bcb405ddc9ed69355513de5f2396dc658fd004d))


## [v5.8.20 (2019-06-04)](https://github.com/laravel/framework/compare/v5.8.19...v5.8.20)

### Added
- Added `viewAny()` to dummy policy class ([#28654](https://github.com/laravel/framework/pull/28654), [#28671](https://github.com/laravel/framework/pull/28671))
- Added `fullpath` option to `make:migration` command ([#28669](https://github.com/laravel/framework/pull/28669))

### Performance improvement
- Improve performance for `Arr::collapse()` ([#28662](https://github.com/laravel/framework/pull/28662), [#28676](https://github.com/laravel/framework/pull/28676))

### Fixed
- Fixed `artisan cache:clear` command with a redis cluster using the Predis library ([#28706](https://github.com/laravel/framework/pull/28706))


## [v5.8.19 (2019-05-28)](https://github.com/laravel/framework/compare/v5.8.18...v5.8.19)

### Added
- Added optional `DYNAMODB_ENDPOINT` env variable to configure endpoint for DynamoDB ([#28600](https://github.com/laravel/framework/pull/28600))
- Added `Illuminate\Foundation\Application::isProduction()` method ([#28602](https://github.com/laravel/framework/pull/28602))
- Allowed exception reporting in `rescue()` to be disabled ([#28617](https://github.com/laravel/framework/pull/28617))
- Allowed to parse Url in Redis configuration ([#28612](https://github.com/laravel/framework/pull/28612), [f4cfb32](https://github.com/laravel/framework/commit/f4cfb3287b358b41735072895a485f8e68c1c7f0))
- Allowed setting additional (`sourceip` and `localdomain`) smtp config options ([#28631](https://github.com/laravel/framework/pull/28631), [435c05b](https://github.com/laravel/framework/commit/435c05b96a241d3d5e37ce524de9ea134714a9be))

### Fixed
- Fixed Eloquent UPDATE queries with alias ([#28607](https://github.com/laravel/framework/pull/28607))
- Fixed `Illuminate\Cache\DynamoDbStore::forever()` ([#28618](https://github.com/laravel/framework/pull/28618))
- Fixed `event:list` command, when using a combination of manually registering events and event auto discovering ([#28624](https://github.com/laravel/framework/pull/28624))

### Performance improvement
- Improve performance for `Arr::flatten()` ([#28614](https://github.com/laravel/framework/pull/28614))

### Changed
- Added `id` to `ModelNotFoundException` exception in `ImplicitRouteBinding` ([#28588](https://github.com/laravel/framework/pull/28588))


## [v5.8.18 (2019-05-21)](https://github.com/laravel/framework/compare/v5.8.17...v5.8.18)

### Added
- Added `html` as a new valid extension for views ([#28541](https://github.com/laravel/framework/pull/28541))
- Added: provide notification callback `withSwiftMessage` in `MailMessage` ([#28535](https://github.com/laravel/framework/pull/28535))

### Fixed
- Fixed `Illuminate\Cache\FileStore::getPayload()` in case of broken cache ([#28536](https://github.com/laravel/framework/pull/28536))
- Fixed exception: `The filename fallback must only contain ASCII characters` in the `Illuminate\Filesystem\FilesystemAdapter::response()` ([#28551](https://github.com/laravel/framework/pull/28551))

### Changed
- Make `Support\Testing\Fakes\MailFake::failures()` returns an empty array ([#28538](https://github.com/laravel/framework/pull/28538))
- Make `Support\Testing\Fakes\BusFake::pipeThrough()` returns `$this` ([#28564](https://github.com/laravel/framework/pull/28564))

### Refactoring
- Cleanup html ([#28583](https://github.com/laravel/framework/pull/28583))


## [v5.8.17 (2019-05-14)](https://github.com/laravel/framework/compare/v5.8.16...v5.8.17)

### Added
- Added `Illuminate\Foundation\Testing\TestResponse::dumpHeaders()` ([#28450](https://github.com/laravel/framework/pull/28450))
- Added `ends_with` validation rule ([#28455](https://github.com/laravel/framework/pull/28455))
- Added possibility to use a few `columns` arguments in the `route:list` command ([#28459](https://github.com/laravel/framework/pull/28459))
- Added `retryAfter` in `Mail\SendQueuedMailable` and `Notifications\SendQueuedNotifications` object ([#28484](https://github.com/laravel/framework/pull/28484))
- Added `Illuminate\Foundation\Console\Kernel::scheduleCache()` ([6587e78](https://github.com/laravel/framework/commit/6587e78383c4ecc8d7f3791f54cf6f536a1fc089))
- Added support for multiple `--path` options within migrate commands ([#28495](https://github.com/laravel/framework/pull/28495))
- Added `Tappable` trait ([#28507](https://github.com/laravel/framework/pull/28507))
- Added support auto-discovery for events in a custom application directory, that sets via `Illuminate\Foundation\Application::useAppPath()` ([#28493](https://github.com/laravel/framework/pull/28493))
- Added passing of notifiable email through reset link ([#28475](https://github.com/laravel/framework/pull/28475))
- Added support flush db on clusters in `PhpRedisConnection` and `PredisConnection` ([f4e8d5c](https://github.com/laravel/framework/commit/f4e8d5c1f1b72e24baac33c336233cca24230783))

### Fixed
- Fixed session resolver  in `RoutingServiceProvider` (without bind of `session` in `Container`) ([#28438](https://github.com/laravel/framework/pull/28438))
- Fixed `route:list` command when routes were dynamically modified ([#28460](https://github.com/laravel/framework/pull/28460), [#28463](https://github.com/laravel/framework/pull/28463))
- Fixed `required` validation with multiple `passes()` calls ([#28502](https://github.com/laravel/framework/pull/28502))
- Fixed the collation bug when changing columns in a migration ([#28514](https://github.com/laravel/framework/pull/28514))
- Added password to the `RedisCluster` only if `redis` >= `4.3.0` ([1371940](https://github.com/laravel/framework/commit/1371940abe17b7b6008e136060fcf5534f15f03f))
- Used `escapeshellarg` on windows symlink in `Filesystem::link()`([44c3feb](https://github.com/laravel/framework/commit/44c3feb604944599ad1c782a9942981c3991fa31))

### Changed
- Reset webpack file for none preset ([#28462](https://github.com/laravel/framework/pull/28462))


## [v5.8.16 (2019-05-07)](https://github.com/laravel/framework/compare/v5.8.15...v5.8.16)

### Added
- Added: Migration Events ([#28342](https://github.com/laravel/framework/pull/28342))
- Added ability to drop types when running the `migrate:fresh` command ([#28382](https://github.com/laravel/framework/pull/28382))
- Added `Renderable` functionality to `MailMessage` ([#28386](https://github.com/laravel/framework/pull/28386))

### Fixed
- Fixed the remaining issues with registering custom Doctrine types ([#28375](https://github.com/laravel/framework/pull/28375))
- Fixed `fromSub()` and `joinSub()` with table prefix in `Query\Builder` ([#28400](https://github.com/laravel/framework/pull/28400))
- Fixed false positives for `Schema::hasTable()` with views ([#28401](https://github.com/laravel/framework/pull/28401))
- Fixed `sync` results with custom `Pivot` model ([#28416](https://github.com/laravel/framework/pull/28416), [e31d131](https://github.com/laravel/framework/commit/e31d13111da02fed6bd2ce7a6393431a4b34f924))

### Changed
- Modified `None` And `React` presets with `vue-template-compiler` ([#28389](https://github.com/laravel/framework/pull/28389))
- Changed `navbar-laravel` class to `bg-white shadow-sm` class in `layouts\app.stub` ([#28417](https://github.com/laravel/framework/pull/28417))
- Don't execute query in `Builder::findMany()` when ids are empty `Arrayable` ([#28432](https://github.com/laravel/framework/pull/28432))
- Added parameter `password` for `RedisCluster` construct function ([#28434](https://github.com/laravel/framework/pull/28434))
- Pass email verification URL to callback in `Auth\Notifications\VerifyEmail` ([#28428](https://github.com/laravel/framework/pull/28428))
- Updated `RouteAction::parse()` ([#28397](https://github.com/laravel/framework/pull/28397))
- Updated `Events\DiscoverEvents` ([#28421](https://github.com/laravel/framework/pull/28421), [#28426](https://github.com/laravel/framework/pull/28426))


## [v5.8.15 (2019-04-27)](https://github.com/laravel/framework/compare/v5.8.14...v5.8.15)

### Added
- Added handling of database URL as database connections ([#28308](https://github.com/laravel/framework/pull/28308), [4560d28](https://github.com/laravel/framework/commit/4560d28a8a5829253b3dea360c4fffb208962f83), [05b029e](https://github.com/laravel/framework/commit/05b029e58d545ee3489d45de01b8306ac0e6cf9e))
- Added the `dd()` / `dump` methods to the `Illuminate\Database\Query\Builder.php` ([#28357](https://github.com/laravel/framework/pull/28357))

### Fixed
- Fixed `BelongsToMany` parent key ([#28317](https://github.com/laravel/framework/pull/28317))
- Fixed `make:auth` command with apps configured views path ([#28324](https://github.com/laravel/framework/pull/28324), [e78cf02](https://github.com/laravel/framework/commit/e78cf0244d530b81e44c0249ded14512aaeb0ef9))
- Fixed recursive replacements in `Str::replaceArray()` ([#28338](https://github.com/laravel/framework/pull/28338))

### Improved
- Added custom message to `TokenMismatchException` exception within `VerifyCsrfToken` class ([#28335](https://github.com/laravel/framework/pull/28335))
- Improved output of `Foundation\Testing\TestResponse::assertSessionDoesntHaveErrors` when called with no arguments ([#28359](https://github.com/laravel/framework/pull/28359))

### Changed
- Allowed logging out other devices without setting remember me cookie ([#28366](https://github.com/laravel/framework/pull/28366))


## [v5.8.14 (2019-04-23)](https://github.com/laravel/framework/compare/v5.8.13...v5.8.14)

### Added
- Implemented `Job Based Retry Delay` ([#28265](https://github.com/laravel/framework/pull/28265))

### Changed
- Update auth stubs with `@error` blade directive ([#28273](https://github.com/laravel/framework/pull/28273))
- Convert email data tables to layout tables ([#28286](https://github.com/laravel/framework/pull/28286))

### Reverted
- Partial reverted [ability of register custom Doctrine DBAL](https://github.com/laravel/framework/pull/28214), since of [#28282](https://github.com/laravel/framework/issues/28282) issue ([#28301](https://github.com/laravel/framework/pull/28301))

### Refactoring
- Replace code with `Null Coalescing Operator` ([#28280](https://github.com/laravel/framework/pull/28280), [#28287](https://github.com/laravel/framework/pull/28287))


## [v5.8.13 (2019-04-18)](https://github.com/laravel/framework/compare/v5.8.12...v5.8.13)

### Added
- Added `@error` blade directive ([#28062](https://github.com/laravel/framework/pull/28062))
- Added the ability to register `custom Doctrine DBAL` types in the schema builder ([#28214](https://github.com/laravel/framework/pull/28214), [91a6afe](https://github.com/laravel/framework/commit/91a6afe1f9f8d18283f3ee9a72b636a121f06da5))

### Fixed
- Fixed: [Event::fake() does not replace dispatcher for guard](https://github.com/laravel/framework/issues/27451) ([#28238](https://github.com/laravel/framework/pull/28238), [be89773](https://github.com/laravel/framework/commit/be89773c52e7491de05dee053b18a38b177d6030))

### Reverted
- Reverted of [`possibility for use in / not in operators in the query builder`](https://github.com/laravel/framework/pull/28192) since of [issue with `wherePivot()` method](https://github.com/laravel/framework/issues/28251) ([04a547ee](https://github.com/laravel/framework/commit/04a547ee25f78ddd738610cdbda2cb393c6795e9))


## [v5.8.12 (2019-04-16)](https://github.com/laravel/framework/compare/v5.8.11...v5.8.12)

### Added
- Added `Illuminate\Support\Collection::duplicates()` ([#28181](https://github.com/laravel/framework/pull/28181))
- Added `Illuminate\Database\Eloquent\Collection::duplicates()` ([#28194](https://github.com/laravel/framework/pull/28194))
- Added `Illuminate\View\FileViewFinder::getViews()` ([#28198](https://github.com/laravel/framework/pull/28198))
- Added helper methods `onSuccess()` \ `onFailure()` \ `pingOnSuccess()` \ `pingOnFailure()` \ `emailOnFailure()` to `Illuminate\Console\Scheduling\Event` ([#28167](https://github.com/laravel/framework/pull/28167))
- Added `SET` datatype on MySQL Grammar ([#28171](https://github.com/laravel/framework/pull/28171))
- Added possibility for use `in` / `not in` operators in the query builder ([#28192](https://github.com/laravel/framework/pull/28192))

### Fixed
- Fixed memory leak in JOIN queries ([#28220](https://github.com/laravel/framework/pull/28220))
- Fixed circular dependency in `Support\Testing\Fakes\QueueFake` for undefined methods ([#28164](https://github.com/laravel/framework/pull/28164))
- Fixed exception in `lt` \ `lte` \ `gt` \ `gte` validations with different types ([#28174](https://github.com/laravel/framework/pull/28174))
- Fixed `string quoting` for `SQL Server` ([#28176](https://github.com/laravel/framework/pull/28176))
- Fixed `whereDay` and `whereMonth` when passing `int` values ([#28185](https://github.com/laravel/framework/pull/28185))

### Changed
- Added `autocomplete` attributes to the html stubs ([#28226](https://github.com/laravel/framework/pull/28226)) 
- Improved `event:list` command ([#28177](https://github.com/laravel/framework/pull/28177), [cde1c5d](https://github.com/laravel/framework/commit/cde1c5d8b38a9b040e70c344bba82781239a0bbf))
- Updated `Illuminate\Database\Console\Factories\FactoryMakeCommand` to generate more IDE friendly code ([#28188](https://github.com/laravel/framework/pull/28188))
- Added missing `LockProvider` interface on `DynamoDbStore` ([#28203](https://github.com/laravel/framework/pull/28203))
- Change session's user_id to unsigned big integer in the stub ([#28206](https://github.com/laravel/framework/pull/28206))


## [v5.8.11 (2019-04-10)](https://github.com/laravel/framework/compare/v5.8.10...v5.8.11)

### Added
- Allowed to call `macros` directly on `Illuminate\Support\Facades\Date` ([#28129](https://github.com/laravel/framework/pull/28129))
- Allowed `lock` to be configured in `local filesystems` ([#28124](https://github.com/laravel/framework/pull/28124))
- Added tracking of the exit code in scheduled event commands ([#28140](https://github.com/laravel/framework/pull/28140))

### Fixed
- Fixed of escaping single quotes in json paths in `Illuminate\Database\Query\Grammars\Grammar` ([#28160](https://github.com/laravel/framework/pull/28160))
- Fixed event discovery with different Application Namespace ([#28145](https://github.com/laravel/framework/pull/28145))

### Changed
- Added view path to end of compiled blade view (in case if path is not empty) ([#28117](https://github.com/laravel/framework/pull/28117), [#28141](https://github.com/laravel/framework/pull/28141))
- Added `realpath` to `app_path` during string replacement in `Illuminate\Foundation\Console\Kernel::load()` ([82ded9a](https://github.com/laravel/framework/commit/82ded9a28621b552589aba66e4e05f9a46f46db6))

### Refactoring
- Refactoring of `Illuminate\Foundation\Events\DiscoverEvents::within()` ([#28122](https://github.com/laravel/framework/pull/28122), [006f999](https://github.com/laravel/framework/commit/006f999d8c629bf87ea0252447866a879d7d4a6e))


## [v5.8.10 (2019-04-04)](https://github.com/laravel/framework/compare/v5.8.9...v5.8.10)

### Added
- Added `replicating` model event ([#28077](https://github.com/laravel/framework/pull/28077))
- Make `NotificationFake` macroable ([#28091](https://github.com/laravel/framework/pull/28091))

### Fixed
- Exclude non-existing directories from event discovery ([#28098](https://github.com/laravel/framework/pull/28098))

### Changed
- Sorting of events in `event:list` command ([3437751](https://github.com/laravel/framework/commit/343775115722ed0e6c3455b72ee7204aefdf37d3))
- Removed path hint in compiled view ([33ce7bb](https://github.com/laravel/framework/commit/33ce7bbb6a7f536036b58b66cc760fbb9eda80de))


## [v5.8.9 (2019-04-02)](https://github.com/laravel/framework/compare/v5.8.8...v5.8.9)

### Added
- Added Event Discovery ([#28064](https://github.com/laravel/framework/pull/28064), [#28085](https://github.com/laravel/framework/pull/28085))

### Fixed
- Fixed serializing a collection from a `Resource` with `preserveKeys` property ([#27985](https://github.com/laravel/framework/pull/27985))
- Fixed: `SoftDelete::runSoftDelete` and `SoftDelete::performDeleteOnModel` with overwritten `Model::setKeysForSaveQuery` ([#28081](https://github.com/laravel/framework/pull/28081))

### Changed
- Update forever cache duration for database driver from minutes to seconds ([#28048](https://github.com/laravel/framework/pull/28048))

### Refactoring:
- Refactoring of `Illuminate\Auth\Access\Gate::callBeforeCallbacks()` ([#28079](https://github.com/laravel/framework/pull/28079))


## [v5.8.8 (2019-03-26)](https://github.com/laravel/framework/compare/v5.8.7...v5.8.8)

### Added
- Added `Illuminate\Database\Query\Builder::forPageBeforeId()` method ([#28011](https://github.com/laravel/framework/pull/28011))

### Fixed
- Fixed `BelongsToMany::detach()` with custom pivot class ([#27997](https://github.com/laravel/framework/pull/27997))
- Fixed incorrect event namespace in generated listener by `event:generate` command ([#28007](https://github.com/laravel/framework/pull/28007))
- Fixed unique validation without ignored column ([#27987](https://github.com/laravel/framework/pull/27987))

### Changed
- Added `parameters` argument to `resolve` helper ([#28020](https://github.com/laravel/framework/pull/28020))
- Don't add the path only if path is `empty` in compiled view ([#27976](https://github.com/laravel/framework/pull/27976))

### Refactoring
- Refactoring of `env()` helper ([#27965](https://github.com/laravel/framework/pull/27965))


## [v5.8.6-v5.8.7 (2019-03-21)](https://github.com/laravel/framework/compare/v5.8.5...v5.8.7)

### Fixed
- Fix: Locks acquired with block() are not immediately released if the callback fails ([#27957](https://github.com/laravel/framework/pull/27957))

### Changed
- Allowed retrieving `env` variables with `getenv()` ([#27958](https://github.com/laravel/framework/pull/27958), [c37702c](https://github.com/laravel/framework/commit/c37702cbdedd4e06eba2162d7a1be7d74362e0cf))
- Used `stripslashes` for `Validation\Rules\Unique.php` ([#27940](https://github.com/laravel/framework/pull/27940), [34759cc](https://github.com/laravel/framework/commit/34759cc0e0e63c952d7f8b7580f48144a063c684))

### Refactoring
- Refactoring of `Illuminate\Http\Concerns::allFiles()` ([#27955](https://github.com/laravel/framework/pull/27955))


## [v5.8.5 (2019-03-19)](https://github.com/laravel/framework/compare/v5.8.4...v5.8.5)

### Added
- Added `Illuminate\Database\DatabaseManager::setReconnector()` ([#27845](https://github.com/laravel/framework/pull/27845))
- Added `Illuminate\Auth\Access\Gate::none()` ([#27859](https://github.com/laravel/framework/pull/27859))
- Added `OtherDeviceLogout` event ([#27865](https://github.com/laravel/framework/pull/27865), [5e87f2d](https://github.com/laravel/framework/commit/5e87f2df072ec4a243b6a3a983a753e8ffa5e6bf))
- Added `even` and `odd` flags to the `Loop` variable in the `blade` ([#27883](https://github.com/laravel/framework/pull/27883))

### Changed 
- Add replacement for lower danish `æ` ([#27886](https://github.com/laravel/framework/pull/27886))
- Show error message from exception, if message exist for `403.blade.php` and `503.blade.php` error ([#27893](https://github.com/laravel/framework/pull/27893), [#27902](https://github.com/laravel/framework/pull/27902))

### Fixed
- Fixed seeding logic in `Arr::shuffle()` ([#27861](https://github.com/laravel/framework/pull/27861)) 
- Fixed `Illuminate\Database\Query\Builder::updateOrInsert()` with empty `$values` ([#27906](https://github.com/laravel/framework/pull/27906))
- Fixed `Application::getNamespace()` method ([#27915](https://github.com/laravel/framework/pull/27915))
- Fixed of store previous url ([#27935](https://github.com/laravel/framework/pull/27935), [791992e](https://github.com/laravel/framework/commit/791992e20efdf043ac3c2d989025d48d648821de))

### Security
- Changed `Validation\Rules\Unique.php` ([da4d4a4](https://github.com/laravel/framework/commit/da4d4a468eee174bd619b4a04aab57e419d10ff4)). You can read more [here](https://blog.laravel.com/unique-rule-sql-injection-warning)


## [v5.8.4 (2019-03-12)](https://github.com/laravel/framework/compare/v5.8.3...v5.8.4)

### Added
- Added `Illuminate\Support\Collection::join()` method ([#27723](https://github.com/laravel/framework/pull/27723))
- Added `Illuminate\Foundation\Http\Kernel::getRouteMiddleware()` method ([#27852](https://github.com/laravel/framework/pull/27852))
- Added danish specific transliteration to `Str` class ([#27857](https://github.com/laravel/framework/pull/27857))

### Fixed
- Fixed JSON boolean queries ([#27847](https://github.com/laravel/framework/pull/27847))


## [v5.8.3 (2019-03-05)](https://github.com/laravel/framework/compare/v5.8.2...v5.8.3)

### Added
- Added `Collection::countBy` ([#27770](https://github.com/laravel/framework/pull/27770))
- Added protected `EloquentUserProvider::newModelQuery()` ([#27734](https://github.com/laravel/framework/pull/27734), [9bb7685](https://github.com/laravel/framework/commit/9bb76853403fcb071b9454f1dc0369a8b42c3257))
- Added protected `StartSession::saveSession()` method ([#27771](https://github.com/laravel/framework/pull/27771), [76c7126](https://github.com/laravel/framework/commit/76c7126641e781fa30d819834f07149dda4e01e6))
- Allow `belongsToMany` to take `Model/Pivot` class name as a second parameter ([#27774](https://github.com/laravel/framework/pull/27774))

### Fixed
- Fixed environment variable parsing ([#27706](https://github.com/laravel/framework/pull/27706))
- Fixed guessed policy names when using `Gate::forUser` ([#27708](https://github.com/laravel/framework/pull/27708))
- Fixed `via` as `string` in the `Notification` ([#27710](https://github.com/laravel/framework/pull/27710))
- Fixed `StartSession` middleware ([499e4fe](https://github.com/laravel/framework/commit/499e4fefefc4f8c0fe6377297b575054ec1d476f))
- Fixed `stack` channel's bug related to the `level` ([#27726](https://github.com/laravel/framework/pull/27726), [bc884bb](https://github.com/laravel/framework/commit/bc884bb30e3dc12545ab63cea1f5a74b33dab59c))
- Fixed `email` validation for not string values ([#27735](https://github.com/laravel/framework/pull/27735))

### Changed
- Check if `MessageBag` is empty before checking keys exist in the `MessageBag` ([#27719](https://github.com/laravel/framework/pull/27719))


## [v5.8.2 (2019-02-27)](https://github.com/laravel/framework/compare/v5.8.1...v5.8.2)

### Fixed
- Fixed quoted environment variable parsing ([#27691](https://github.com/laravel/framework/pull/27691))


## [v5.8.1 (2019-02-27)](https://github.com/laravel/framework/compare/v5.8.0...v5.8.1)

### Added
- Added `Illuminate\View\FileViewFinder::setPaths()` ([#27678](https://github.com/laravel/framework/pull/27678))

### Changed
- Return fake objects from facades ([#27680](https://github.com/laravel/framework/pull/27680))

### Reverted
- reverted changes related to the `Facade` ([63d87d7](https://github.com/laravel/framework/commit/63d87d78e08cc502947f07ebbfa4993955339c5a))


## [v5.8.0 (2019-02-26)](https://github.com/laravel/framework/compare/5.7...v5.8.0)

Check the upgrade guide in the [Official Laravel Documentation](https://laravel.com/docs/5.8/upgrade).
