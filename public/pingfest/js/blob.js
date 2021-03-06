!(function (t, i) {
  'function' == typeof define && define.amd
    ? define([], i)
    : 'object' == typeof module && module.exports
    ? (module.exports = i())
    : (t.Jelly = i());
})(this, function () {
  function t(t, i) {
    for (var n in i) t[n] = a.arr(i[n]) ? i[n].slice(0) : i[n];
    return t;
  }
  function i(i, n) {
    i || (i = {});
    for (var e = 1; e < arguments.length; e++) t(i, arguments[e]);
    return i;
  }
  function n(t) {
    var i = 0 | t.clientWidth,
      n = 0 | t.clientHeight;
    return (
      (t.width !== i || t.height !== n) && ((t.width = i), (t.height = n), !0)
    );
  }
  function e(t) {
    return {
      count: 0,
      async: !1,
      add: function () {
        this.count++, (this.async = !0);
      },
      check: function () {
        0 == --this.count && t();
      },
      checkNoAsync: function () {
        this.async || t();
      },
    };
  }
  function o() {
    return new (function () {
      (this.resolve = null),
        (this.reject = null),
        (this.promise = new Promise(
          function (t, i) {
            (this.resolve = t), (this.reject = i);
          }.bind(this)
        ));
    })();
  }
  function s(t, i) {
    (this.canvas = a.str(t) ? document.querySelector(t) : t),
      (this.ctx = this.canvas.getContext('2d')),
      (this.o = []),
      this.init(a.arr(i) ? i : [i]);
  }
  var a = {
    arr: function (t) {
      return Array.isArray(t);
    },
    str: function (t) {
      return 'string' == typeof t;
    },
    fnc: function (t) {
      return 'function' == typeof t;
    },
  };
  return (
    (s.prototype = {
      defaults: {
        pathsContainer: document,
        borderWidth: 4,
        color: '#666',
        imageCentroid: !0,
        debug: !1,
        pointsNumber: 10,
        mouseIncidence: 20,
        maxIncidence: 30,
        maxDistance: 70,
        intensity: 0.95,
        fastness: 0.025,
        ent: 0.25,
        x: 0,
        y: 0,
      },
      init: function (t) {
        n(this.canvas),
          (this.width = this.canvas.width),
          (this.height = this.canvas.height),
          (this.d = o()),
          (this.promise = this.d.promise),
          this.initEvents(),
          this.initOptions(t);
      },
      initEvents: function () {
        var t = this;
        this.canvas.addEventListener('mousemove', function (i) {
          var n = t.canvas.getBoundingClientRect(),
            e = i.clientX - n.left,
            o = i.clientY - n.top,
            s = e - t.mouseX,
            a = o - t.mouseY,
            r = Math.sqrt(s * s * 3 + a * a * 3);
          r < 2 && (r = 0), r > 100 && (r = 100);
          var h = n.width / t.canvas.offsetWidth,
            c = n.height / t.canvas.offsetHeight;
          (t.mouseX = e * (1 / h)),
            (t.mouseY = o * (1 / c)),
            (t.speed = r ? r / 10 : 0);
        }),
          this.canvas.addEventListener('mouseout', function (i) {
            (t.mouseX = void 0), (t.mouseY = void 0), (t.speed = void 0);
          });
      },
      initOptions: function (t) {
        function n(t, n) {
          i(t, {
            pointsData: s.getPointsData(t),
            centroid: a.str(t.centroid)
              ? document.querySelector(t.centroid)
              : t.centroid,
          }),
            (s.o[n] = i(t, { centroidPoint: s.getCentroid(t.pointsData) })),
            t.hidden && s.animate({ animate: !1, i: n }, !0);
        }
        function o(t, i) {
          if (t.svg) {
            r.add();
            var e = new XMLHttpRequest();
            e.open('GET', t.svg),
              e.overrideMimeType('image/svg+xml'),
              (e.onreadystatechange = function () {
                if (4 === e.readyState) {
                  var o = document.implementation.createHTMLDocument('');
                  (o.body.innerHTML = 200 === e.status ? e.responseText : ''),
                    (t.pathsContainer = o),
                    n(t, i),
                    r.check();
                }
              }),
              e.send();
          } else n(t, i);
        }
        for (
          var s = this, r = e(this.initJelly.bind(this)), h = 0;
          h < t.length;
          h++
        )
          o(i({}, this.defaults, t[h]), h);
        r.checkNoAsync();
      },
      initJelly: function () {
        function t(t) {
          n.add();
          var i = new Image();
          (i.onload = function () {
            (t.image = i), n.check();
          }),
            (i.src = t.image);
        }
        for (
          var i = this,
            n = e(function () {
              i.d.resolve(), i.renderJelly();
            }),
            o = 0;
          o < this.o.length;
          o++
        )
          this.o[o].image && t(this.o[o]);
        n.checkNoAsync();
      },
      shake: function (t) {
        var n = this;
        this.promise.then(function () {
          for (
            var e,
              o = i({ i: 0, x: 0, y: 0 }, t),
              s = n.o[o.i].pointsData,
              a = 0;
            a < s.length;
            a++
          ) {
            e = s[a];
            for (var r = 0; r < e.length; r += 2) n.animateShake(e[r], o);
          }
        });
      },
      animateShake: function (t, i) {
        (t.x += i.x), (t.y += i.y);
      },
      morph: function (t) {
        var n = this;
        this.promise.then(function () {
          for (
            var e,
              o,
              s = i({ i: 0, maxDelay: 0, animate: !0 }, t),
              a = n.o[s.i].pointsData,
              r = n.getPointsData(i(n.o[s.i], s)),
              h = 0;
            h < a.length;
            h++
          ) {
            (e = a[h]), (o = r[h]);
            for (var c = 0; c < e.length; c++) n.animateMorph(e[c], o[c], s);
          }
        });
      },
      animateMorph: function (t, i, n) {
        n.animate
          ? setTimeout(function () {
              (t.ox = i.ox), (t.oy = i.oy);
            }, Math.floor(Math.random() * n.maxDelay))
          : ((t.ox = t.x = i.ox), (t.oy = t.y = i.oy));
      },
      hide: function (t) {
        var i = this;
        this.promise.then(function () {
          i.animate(t, !0);
        });
      },
      show: function (t) {
        var i = this;
        this.promise.then(function () {
          i.animate(t, !1);
        });
      },
      animate: function (t, n) {
        var e = i({ i: 0, maxDelay: 0, animate: !0 }, t);
        n && i(e, this.o[e.i].centroidPoint);
        for (var o, s = this.o[e.i].pointsData, a = 0; a < s.length; a++) {
          o = s[a];
          for (var r = 0; r < o.length; r++)
            n ? this.animateHide(o[r], e) : this.animateShow(o[r], e);
        }
      },
      animateHide: function (t, i) {
        (t.oldX = t.ox),
          (t.oldY = t.oy),
          i.animate
            ? setTimeout(function () {
                (t.oldX = t.ox), (t.oldY = t.oy), (t.ox = i.x), (t.oy = i.y);
              }, Math.floor(Math.random() * i.maxDelay))
            : ((t.ox = t.x = i.x), (t.oy = t.y = i.y));
      },
      animateShow: function (t, i) {
        setTimeout(function () {
          (t.ox = void 0 !== t.oldX ? t.oldX : t.ox),
            (t.oy = void 0 !== t.oldY ? t.oldY : t.oy);
        }, Math.floor(Math.random() * i.maxDelay)),
          i.animate
            ? setTimeout(function () {
                (t.ox = void 0 !== t.oldX ? t.oldX : t.ox),
                  (t.oy = void 0 !== t.oldY ? t.oldY : t.oy);
              }, Math.floor(Math.random() * i.maxDelay))
            : ((t.ox = t.x = void 0 !== t.oldX ? t.oldX : t.ox),
              (t.oy = t.y = void 0 !== t.oldY ? t.oldY : t.oy));
      },
      getPointsData: function (t) {
        for (
          var i = a.str(t.paths)
              ? t.pathsContainer.querySelectorAll(t.paths)
              : t.paths,
            n = [],
            e = 0;
          e < i.length;
          e++
        )
          n.push(this.getPathPoints(i[e], t));
        return n;
      },
      getPathPoints: function (t, n) {
        for (
          var e,
            o = t.getTotalLength(),
            s = n.pointsNumber,
            a = o / s,
            r = 0,
            h = { xs: 0, ys: 0 },
            c = [];
          s--;

        )
          (e = t.getPointAtLength(r)),
            (h.x = e.x + n.x),
            (h.y = e.y + n.y),
            c.push(i({ ox: h.x, oy: h.y }, h)),
            (r += a);
        return c;
      },
      calcLoop: function (t, i) {
        var n,
          e,
          o,
          s,
          a = t.length;
        for (s = 0; s < a; s++) {
          (t[s].xs *= i.intensity),
            (t[s].ys *= i.intensity),
            (t[s].xs > 11 || t[s].xs < -11) &&
              (t[s].xs = 11 * (t[s].xs < 0 ? -1 : 1)),
            (t[s].xs -= (t[s].x - t[s].ox) * i.fastness),
            (t[s].ys -= (t[s].y - t[s].oy) * i.fastness),
            (t[s].x += t[s].xs),
            (t[s].y += t[s].ys);
          var r = t[s].x - this.mouseX,
            h = t[s].y - this.mouseY,
            c = Math.sqrt(r * r + h * h),
            d = Math.min(i.mouseIncidence * this.speed, i.maxIncidence);
          c < d && ((t[s].xs = (r * d) / 100), (t[s].ys = (h * d) / 100));
        }
        var u = a - 1;
        for (s = 0; s < a; s++)
          (n = t[u].x - t[s].x),
            (e = t[u].y - t[s].y),
            (o = Math.sqrt(n * n + e * e)),
            o > i.maxDistance &&
              ((t[s].xs += (i.ent * n) / o),
              (t[s].ys += (i.ent * e) / o),
              (t[u].xs -= (i.ent * n) / o),
              (t[u].ys -= (i.ent * e) / o)),
            (u = s);
      },
      renderJelly: function () {
        this.ctx.clearRect(0, 0, this.width, this.height);
        var t, i, n, e, o, s, a, r;
        for (a = 0; a < this.o.length; a++) {
          for (t = this.o[a], r = 0; r < t.pointsData.length; r++)
            (i = t.pointsData[r]), this.calcLoop(i, t);
          for (
            t.centroidPoint = this.getCentroid(t.pointsData),
              t.centroid &&
                (t.centroid.style.transform =
                  'translate(' +
                  t.centroidPoint.x +
                  'px, ' +
                  t.centroidPoint.y +
                  'px)'),
              r = 0;
            r < t.pointsData.length;
            r++
          )
            this.ctx.save(),
              (i = t.pointsData[r]),
              this.drawPath(i, t),
              (t.hover = this.ctx.isPointInPath(this.mouseX, this.mouseY)),
              this.ctx.clip(),
              t.image
                ? ((o = t.image.width),
                  (s = t.image.height),
                  (n = t.imageCentroid ? t.centroidPoint.x - o / 2 : 0),
                  (e = t.imageCentroid ? t.centroidPoint.y - s / 2 : 0),
                  this.ctx.drawImage(t.image, n, e, o, s))
                : ((this.ctx.fillStyle = t.color),
                  this.ctx.fill(),
                  t.border &&
                    ((this.ctx.strokeStyle = t.border),
                    (this.ctx.lineWidth = t.borderWidth),
                    this.ctx.stroke())),
              this.ctx.restore(),
              t.debug && this.drawPoints(i, t);
        }
        window.requestAnimationFrame(this.renderJelly.bind(this));
      },
      drawPath: function (t) {
        this.ctx.beginPath(), this.ctx.moveTo(t[0].x, t[0].y);
        var i,
          n,
          e,
          o = t.length;
        for (i = 0; i <= o; i++)
          (n = t[i >= o ? i - o : i]),
            (e = t[i + 1 >= o ? i + 1 - o : i + 1]),
            this.ctx.quadraticCurveTo(
              n.x,
              n.y,
              0.5 * (n.x + e.x),
              0.5 * (n.y + e.y)
            );
        this.ctx.closePath();
      },
      drawPoints: function (t, i) {
        for (var n = 0; n < t.length; n++) this.drawPoint(t[n]);
        this.drawPoint(i.centroidPoint);
      },
      drawPoint: function (t) {
        this.ctx.beginPath(),
          this.ctx.arc(t.x, t.y, 5, 0, 2 * Math.PI, !1),
          this.ctx.closePath(),
          (this.ctx.fillStyle = 'red'),
          this.ctx.fill();
      },
      getCentroid: function (t) {
        var i,
          n,
          e,
          o = 0,
          s = 0,
          a = 0;
        for (i = 0; i < t.length; i++)
          for (e = t[i], o += e.length, n = 0; n < e.length; n++)
            (s += e[n].x), (a += e[n].y);
        return { x: s / o, y: a / o };
      },
      getHoverIndex: function () {
        for (var t = 0; t < this.o.length; t++)
          if (this.o[t] && this.o[t].hover) return t;
        return -1;
      },
    }),
    s
  );
});
