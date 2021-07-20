# Inspire plugin for Moodle

This plugin is a proof of concept to investigate some advanced patterns for the [Moodle App](https://github.com/moodlehq/moodleapp). The main goal was to explore how to write a plugin using similar tooling to the one used to develop the app. The plugin adds a couple of sections in the main menu that do the same thing: showing random inspirational quotes. One section is written using the standard approach (mustache templates and PHP), whilst the other is written more in line to what developing code for the mobile app would look like (using TypeScript and components).

This is what it looks like in action:

https://user-images.githubusercontent.com/1517677/126275397-88e8bcce-ab57-4a5e-949a-ae1989c3d8fd.mp4

## How to use it

If you want to run this plugin, it will not work with the standard app because it was modified to support experimental functionality. You can see the changes required for the app in this commit: https://github.com/NoelDeMartin/moodleapp/commit/e5e25431d563106393bc4f59b284f487f3451d94

You also have to build the JavaScript assets given that this repository only contains the source. You can download the plugin and build it locally using the following commands:

```sh
git clone https://github.com/NoelDeMartin/moodle-local_inspire /path/to/my/moodle/local/inspire
cd /path/to/my/moodle/local/inspire/js
npm install
npm run prod
```

## Advanced features

If you look at the source code, you can find most of the new features under `js/src/`. You will notice that it imports from a dependency called `@moodlehq/moodle-app`. This is a library that contains type definitions and utilities to help writing plugins for the app. At the moment though, this library doesn't actually exist. The code has just been configured to act as an alias and you can find the source at `js/lib`.

There are two features worth highlighting from this codebase.

### TypeScript

At the moment, plugins running JavaScript have access to a subset of the classes available in the app. However, given the lack of documentation, it is not easy to discern which are available and you'd need to look at the source code of the app in order to find out. Needless to say that the documentation should be updated, but there is also another opportunity to improve the development experience for plugin developers. Using TypeScript, which is the language used to develop the core of the app, this information would be available at their fingertips. It would also serve for static validation, and most code editors today benefit from type declarations even if the code is written in plain JavaScript.

There is nothing preventing developers from writing plugins using TypeScript today, but the process is cumbersome given the lack of types. Plugin scripts are also run on an awkard scope, which causes reliance on statements such as `var that = this` that are detrimental to code readability.

In this project, types have been improved by copying some of the application declarations into the `js/lib/types` folder. Global types that are only available for plugins have also been declared manually, and this includes some new public APIs that are specific to plugins (for example, a function to get plugin-scoped translations). Most of this could be automated, but doing it manually suffices for this proof of concept.

The awkard scoping has also been improved using [the with javascript statement](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/with). Although its use is discouraged, this is widely used in frameworks such as [Vue](https://github.com/vuejs/vue-next/blob/master/packages/compiler-core/src/codegen.ts#L244) and [Alpine](https://github.com/alpinejs/alpine/blob/main/packages/alpinejs/src/evaluator.js#L66), so it's justified here because it's a similar use-case (we could say that this is a framework to developer Moodle App Plugins). The reliance on this statement can also be hidden from plugin developers, by providing some helper functions in PHP. For this project though, this has just been written manually in PHP after reading the JavaScript code.

The result of these two improvements is a lean `js/src/main.ts` file that would seem very familiar to any TypeScript developer. Separated files for each class, proper type inference, etc.

### Components

Supporting components defined in plugins wasn't as straight-forward as using TypeScript. However, it becomes necessary once the full plugin API is exposed. For example, it would be impossible to declare custom routes without declaring any components.

The solution that has been applied in this proof of concept is not comprehensive, but it serves as an example of what it could look like. Instead of using Angular APIs to register application routes, we have defined some adapters in the mobile app that can also serve for sandboxing in case we don't want to grant full priviledges in plugins.

This results in a custom component format, that is not strictly an Angular component. But it's close enough to improve the developer experience. It allows for a separate template with property binding and lifecycle hooks (which are specific to plugins, so they are not the same as Angular lifecycle hooks).

This approach could be taken further by allowing to declare reusable plugin components, but this hasn't been explored here.

## Going further

It is unlikely that this goes beyond a proof of concept for now, because this use-case seems to be in the minority. Most plugin developers are trying to adapt Moodle plugins to mobile, instead of writting app-specific plugins. So doing this would probably require too much effort for little payoff.

In any case, if you've got any comments or feedback about this, let us know!
