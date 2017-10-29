
    var testsContext = require.context("../../tests/JavaScript", false);

    var runnable = testsContext.keys();

    runnable.forEach(testsContext);
    